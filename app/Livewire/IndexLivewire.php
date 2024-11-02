<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Traits\CarTrait;
use Faker\Provider\ar_EG\Company;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class IndexLivewire extends Component

{
    Use WithPagination;
    Use CarTrait;//clase personalizada para manejar el ShoppingCart
    use WithFileUploads;
    public $rating=5;
    public $sendCategory,$file;
    public $isOpen=false;
    public $product;
    protected $listeners=['render','delete'=>'delete'];

    protected $rules=[
        'product.name'=>'required',
        'product.fullname'=>'required',
        'product.description'=>'required',
        'product.price'=>'required',
        'product.stock'=>'required',
        'product.discount'=>'required',
        'product.availability'=>'required',
        'product.category_id'=>'required',
    ];
    public function mount(){
        $this->product["availability"]=true;
        $this->product["discount"]=0;
    }
    public function render()
    {
        $categories=Category::all();
        $products= Product::paginate(6);
        return view('livewire.index-livewire',compact('categories','products'));
    }

    public function agregarProducto($id){
        $product=Product::find($id);
        $this->emit('actualizarContador');
        $this->emit('loadCart');
        $this->agregar($product);
    }

    public function delete($id){
        $product=Product::find($id);
        if(isset($product->image)){
            Storage::delete('storage/'.$product->image->url);
            Image::where('imageable_id',$id)->where('imageable_type',Company::class)->delete();
        }
        $product->delete();
    }

    //Para resetear los filtros en el paginado
    public function updatingsendCategory(){
        $this->resetPage();
    }
}
