<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class IndexLivewire extends Component
{
    public function render()
    {
        $categories=Category::all();
        $products= Product::paginate(6);
        return view('livewire.index-livewire',compact('categories','products'));
    }
}
