<?php

namespace App\Livewire;

use App\Livewire\Forms\ProductForm;
use App\Models\Category;
use App\Models\Product;
use App\Traits\CarTrait;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class ProductMain extends Component
{
    use WithFileUploads;
    use WithPagination;
    use Actions;
    use CarTrait; // Añadido para manejar el carrito de compras

    public $isOpen = false;
    public $cayegory_id;
    public ?Product $product;
    public ProductForm $form;
    public $search, $b_cat, $foto;
    public $rating = 5; // Añadido para mantener consistencia con el otro código

    protected $listeners = ['render', 'delete' => 'delete', 'actualizarContador', 'loadCart']; // Añadidos nuevos listeners

    public function render()
    {
        $products = Product::where('name', 'LIKE', '%' . $this->search . '%')
            ->Categoria($this->b_cat)
            ->where('availability', 1) // Añadido para mostrar solo productos disponibles
            ->latest('id')->paginate(10);
        $categories = Category::all();

        return view('livewire.product.Product-main', compact('categories', 'products'));
    }

    public function create()
    {
        $this->isOpen = true;
        $this->form->reset();
        $this->reset(['product', 'foto']);
        $this->resetValidation();
        //$this->form->mount($this->supplier_id);
    }

    public function edit(Product $product)
    {
        //dd($vehicle);
        $this->product = $product;
        $this->form->fill($product);
        if (isset($product->image->url)) {
            $this->foto = $product->image->url;
        } else {
            $this->foto = '../../img/sinfoto.jpg';
        }
        $this->isOpen = true;
        $this->resetValidation();
    }

    public function store()
    {
        $this->validate();
        if (!isset($this->product->id)) {
            $product = Product::create($this->form->all());
            if ($this->foto) {
                $url = $this->foto->store('products', 'public');
                $product->image()->create(['url' => $url]);
            }
            $this->dialog()->success(
                $title = 'Mensaje del sistema',
                $description = 'Registro creado'
            );
        } else {
            $this->product->update($this->form->all());
            if (is_object($this->foto)) {
                $url = $this->foto->store('products', 'public');
                if ($this->product->image) {
                    Storage::delete($this->product->image->url);
                    $this->product->image()->update(['url' => $url]);
                } else {
                    $this->product->image()->create(['url' => $url]);
                }
            }
            $this->dialog()->success(
                $title = 'Mensaje del sistema',
                $description = 'Registro actualizado'
            );
        }
        $this->reset(['isOpen']);
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::delete($product->image->url);
            $product->image()->delete();
            $product->delete();
        }

    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    // Método para agregar producto al carrito
    public function agregarProducto($id)
    {
        $product = Product::find($id);
        $this->emit('actualizarContador');
        $this->emit('loadCart');
        $this->agregar($product);
        $this->dialog()->success(
            $title = 'Producto agregado',
            $description = 'El producto se ha añadido al carrito'
        );
    }

    // Método para actualizar el contador del carrito (puedes personalizar según tus necesidades)
    public function actualizarContador()
    {
        // Implementa la lógica para actualizar el contador del carrito
        // Por ejemplo, podrías emitir un evento con el nuevo conteo
        $this->emit('cartCountUpdated', $this->obtenerTotalItems());
    }

    // Método para cargar el carrito (puedes personalizar según tus necesidades)
    public function loadCart()
    {
        // Implementa la lógica para cargar el carrito
        // Por ejemplo, podrías emitir un evento con los datos del carrito
        $this->emit('cartLoaded', $this->obtenerCarrito());
    }

    // Método para obtener el total de items en el carrito (implementa según tu lógica)
    private function obtenerTotalItems()
    {
        // Implementa la lógica para obtener el total de items
        // Esto dependerá de cómo hayas implementado el CarTrait
        return 0; // Reemplaza con tu lógica real
    }

    // Método para obtener los datos del carrito (implementa según tu lógica)
    private function obtenerCarrito()
    {
        // Implementa la lógica para obtener los datos del carrito
        // Esto dependerá de cómo hayas implementado el CarTrait
        return []; // Reemplaza con tu lógica real
    }
}
