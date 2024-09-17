<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ImageForm extends Form
{
    #[Rule('required')]
    public $url,$imageable_id,$imageable_type;
}

