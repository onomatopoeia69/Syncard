<?php

namespace App\Livewire\User;

use Livewire\Component;

class Child extends Component
{

     public function openAddChild()
    {
        $this->dispatch('open-add-child');
    }       

    

    public function render()
    {
        return view('livewire.user.child');
    }
}
