<?php

namespace App\Livewire;

use App\Traits\CarTrait;
use Livewire\Component;

class Navigation extends Component
{
    Use CarTrait;
    public $totalCart=0;
    protected $listeners=['actualizarContador'];

    public function mount(){
        $this->totalCart=$this->totalItems();
    }
    public function render()
    {
        return view('livewire.navigation');
    }

    public function actualizarContador(){
        $this->totalCart=$this->totalItems();
    }
}
