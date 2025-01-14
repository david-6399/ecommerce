<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Luser extends Component
{
    public $search ;
    public $pageStatus = null;
    public $addAddress = false;
    public $editUser = [];
    public $secondAddressActive = null;

    public function rules(){
        return [
            'editUser.name' => 'required',
            'editUser.phone' => 'required|numeric',
        ];
    }
// -------- Update address information of user
    public function updateAddress()
    {
        $validation = $this->validate([
            'editUser.Wilaya' => 'nullable',
            'editUser.address1' => 'nullable',
            'editUser.address2' => 'nullable',
        ]);

        $dataToUpdate = $validation['editUser'];
        User::find($this->editUser['id'])->update($dataToUpdate);
    }

// -------- Update name phone information of user
    public function updateUserInfo(){
        $validation = $this->validate();
        User::find($this->editUser['id'])->update($validation['editUser']);
    }

    public function addNewAddress(){
        if($this->addAddress){
            $this->addAddress = false ;
        }else{
            $this->addAddress = true ;
        }
    }
    
    public function updateUser($id){
        $this->editUser = User::find($id)->toArray();
        $this->pageStatus = 'edit';
        $this->secondAddressActive = $this->editUser['address2'];
    }

    public function test(){
        dd('COD function is working');
    }
    
    public function render()
    {
        $user = User::where('name','like','%'.$this->search.'%')
            ->orwhere('phone','like','%'.$this->search.'%')
            ->orwhere('email','like','%'.$this->search.'%')
            ->get();
        return view('livewire.users.index',[
            'users' => $user,
        ])
                ->extends('welcome')
                ->section('content');
    }
}
