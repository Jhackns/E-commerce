<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class TiendaMain extends Component
{
    use Actions;
    use WithPagination;
    public $isOpen = false;
    public $cayegory_id;
    public ?Product $product;
    public $search, $sendCategory, $b_cat;


    public function mount()
    {   $this->product["availability"]=true;
        $this->sendCategory = 0; // O cualquier otro valor inicial que desees
    }

    public function render()
    {
        $products = Product::where('name', 'LIKE', '%' . $this->search . '%')
        ->Categoria($this->sendCategory)
        ->latest('id')->paginate(10);
    $categories = Category::all();
       // $products=Product::where('availability',1)->category($this->sendCategory)->latest('id')->paginate(6);
        return view('livewire.tienda-main', compact('categories', 'products'));
    }
}
