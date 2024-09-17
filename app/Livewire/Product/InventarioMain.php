<?php

namespace App\Livewire\Product;

use App\Livewire\Forms\ProductForm;
use App\Models\Category;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class InventarioMain extends Component
{
    use WithPagination, Actions;

    public $isOpen = false;
    public $position_id;
    public ?Product $Product;
    public ProductForm $form;
    public $search = '', $b_cat;
    public $stock = [],$newStock = [] ,$discount = [];

    protected $queryString = ['search', 'b_cat'];

    public function render()
    {
        $this->loadProductData();

        $productos = Product::query()
            ->where('name', 'LIKE', "%{$this->search}%")
            ->when($this->b_cat, function ($query) {
                return $query->categoria($this->b_cat);
            })
            ->latest('id')
            ->paginate(10);

        $categories = Category::all();

        return view('livewire.product.inventario-main', compact('categories', 'productos'));
    }

    private function loadProductData()
    {
        $products = Product::all(['id', 'stock', 'discount']);
        foreach ($products as $product) {
            $this->stock[$product->id] = $product->stock;
            $this->newStock[$product->id] = 0;
            $this->discount[$product->id] = $product->discount;
        }
    }

    public function updateStock($productId)
    {
        $product = Product::find($productId);
        $newQuantity = $this->newStock[$productId];

        // Sumar la nueva cantidad al stock existente
        $product->stock += $newQuantity;
        $product->save();

        // Actualizar el valor en la vista
        $this->stock[$productId] = $product->stock;
        $this->newStock[$productId] = 0; // Resetear a 0 después de la actualización

        $this->dialog()->success(
            $title = 'Mensaje del sistema',
            $description = 'Stock actualizado correctamente'
        );
    }

    public function updateDiscount($productId)
    {
        $this->updateProductField($productId, 'discount', 'Descuento actualizado correctamente');
    }

    private function updateProductField($productId, $field, $message)
    {
        $product = Product::find($productId);
        $product->$field = $this->$field[$productId];
        $product->save();

        $this->dialog()->success(
            $title = 'Mensaje del sistema',
            $description = $message
        );
    }

    public function calculateDiscountedPrice($productId)
    {
        $product = Product::find($productId);
        $originalPrice = $product->price;
        $discountPercentage = $this->discount[$productId];

        $discountAmount = $originalPrice * ($discountPercentage / 100);
        $discountedPrice = $originalPrice - $discountAmount;

        return number_format($discountedPrice, 2);
    }

    public function reportePDF(){
        $products= Product::all();
        $pdf = Pdf::loadView('reports.Productpdf',compact('products'));
       // return $pdf->download('reporteProducto.pdf');
       return $pdf ->stream();
    }


}
