<?php

namespace App\Livewire;

use App\Livewire\Forms\CategoryForm;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class CategoryMain extends Component

{
    use WithFileUploads;
    use WithPagination;
    use Actions;
    public $isOpen = false;
    public ?Category $category;
    public CategoryForm $form;
    public $search, $foto;



    public function render()
    {
        $categorias = Category::where('name', 'LIKE', '%' . $this->search . '%')->latest('id')->paginate(10);

        return view('livewire.category.Category-main', compact('categorias'));
    }


    public function create()
    {
        $this->isOpen = true;
        $this->form->reset();
        $this->reset(['category', 'foto']);
        $this->resetValidation();
        //$this->form->mount($this->supplier_id);
    }

    public function edit(Category $category)
    {
        //dd($vehicle);
        $this->category = $category;
        $this->form->fill($category);
        if(isset($category->image->url)){
            $this->foto=$category->image->url;
        }else{
            $this->foto='../../img/sinfoto.jpg';
        }
        $this->isOpen = true;
        $this->resetValidation();
    }

    public function store()
    {
        $this->validate();
        if (!isset($this->category->id)) {
            $category = Category::create($this->form->all());
            if ($this->foto) {
                $url = $this->foto->store('categories', 'public');
                $category->image()->create(['url' => $url]);
            }
            $this->dialog()->success(
                $title = 'Mensaje del sistema',
                $description = 'Registro creado'
            );
        } else {
            $this->category->update($this->form->all());
            if (is_object($this->foto)) {
                $url = $this->foto->store('categories', 'public');
                if ($this->category->image) {
                    Storage::delete($this->category->image->url);
                    $this->category->image()->update(['url' => $url]);
                } else {
                $this->category->image()->create(['url' => $url]);
            }
            }
            $this->dialog()->success(
                $title = 'Mensaje del sistema',
                $description = 'Registro actualizado'
            );
        }
        $this->reset(['isOpen']);
    }

    public function destroy(Category $category)
    {
        if ($category->image) {
            Storage::delete($category->image->url);
            $category->image()->delete();
        }
        $category->delete();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
