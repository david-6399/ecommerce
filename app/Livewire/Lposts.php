<?php

namespace App\Livewire;

use Livewire\Component;

class Lposts extends Component
{

    // public $name ;
    // public $price;
    // public $selectObtions ;

    public $test = [];

    public function render()
    {
        return view('livewire.lposts');
    }

    public function updated($property)
{
    dump($property);
}

    public function create(){
        dd('create function is runing');
    }
}
