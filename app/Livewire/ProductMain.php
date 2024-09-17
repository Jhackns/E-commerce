<?php

namespace App\Livewire;

use App\Livewire\Forms\ProductForm;
use App\Models\Category;
use App\Models\Product;
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
    public $isOpen = false;
    public $cayegory_id;
    public ?Product $product;
    public ProductForm $form;
    public $search, $b_cat, $foto;

    public function render()
    {
        // $integrantes=Product::where('fullname','LIKE','%'.$this->search.'%')->latest('id')->paginate(10);
        $products = Product::where('name', 'LIKE', '%' . $this->search . '%')
            ->Categoria($this->b_cat)
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
}
