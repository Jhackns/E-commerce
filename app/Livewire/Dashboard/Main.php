<?php

namespace App\Livewire\Dashboard;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class Main extends Component
{

    public $productsByCategory;

    public function mount()
    {

    }

public function render()
{
    $products = Product::latest()->paginate(3); // Ajusta el número según tus necesidades
    $totalProducts = Product::count();

    $categories = Category::withCount('products')->get();
    $productCounts = $categories->map(function ($category) {
        return [
            'category' => $category->name,
            'count' => $category->products_count
        ];
    });

    return view('livewire.dashboard.main', compact('products', 'totalProducts', 'productCounts'));
}
}
