<?php

namespace App\Livewire;

use App\Models\category;
use Livewire\Component;

class Lcategory extends Component
{
    public $showToggle = false ;
    public $name = "";
    public $search = "";

    public function render()
    {
        $categories = category::where('name', 'LIKE', '%' . $this->search . '%')->get();
        
        $data = [
            'categories' => $categories
        ];
        return view('livewire.category.index' , $data)
                ->extends('welcome')
                ->section('content');
    }

    // public function updatedName(){
    //     dd('test');
    // }

    public function addNewCategory(){
        $this->showToggle = true ;
    }

    public function cancel(){
        $this->showToggle = false ;
    }

    public function newCategory(){
        $validateData = $this->validate([
            'name' => 'required'
        ]);
        category::create($validateData);
        $this->showToggle = false ; 
        $this->name = "";
    }

    public function updateName($id){
        $category = category::find($id);
        $this->dispatch('updateCategoryName', category:$category);
    }

    public function test($id, $value){
        category::find($id)->update(['name'=>$value]);
        $this->dispatch('successName');
    }

    public function deleteCategory($id){
        $category = category::find($id);
        $this->dispatch('delete' , category:$category);
    }

    public function confirmDeleteCategory($id){
        category::find($id)->delete();
        $this->dispatch('successDelete');
    }
}
