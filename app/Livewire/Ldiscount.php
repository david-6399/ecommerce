<?php

namespace App\Livewire;

use Livewire\Component;

class Ldiscount extends Component
{

    public $showToggle = false;

    public function render()
    {
        return view('livewire.discount.index')
                ->extends('welcome')
                ->section('content');
    }
}
