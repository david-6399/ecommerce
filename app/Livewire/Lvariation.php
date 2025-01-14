<?php

namespace App\Livewire;

use App\Models\variation;
use App\Models\variationObtion;
use Livewire\Component;
use Livewire\WithPagination;

class Lvariation extends Component
{

    public function render()
    {
       
        return view('livewire.variation.index',[
            'variations' => $variationData 
        ])
                ->extends('welcome')
                ->section('content');
    }

    

    
}
