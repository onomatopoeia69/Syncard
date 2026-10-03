<?php

namespace App\Livewire\Modal\Child;

use App\Models\ChildProfile;
use Livewire\Attributes\On;
use Livewire\Component;

class View extends Component
{
    public bool $showModal = false;

    public ?ChildProfile $child = null;

    #[On('view-child')]
    public function open($id)
    {
        $this->dispatch('init-lucide');
        
        $this->child = ChildProfile::with([
            'nfcTag.scans',
            'emergencyContacts',
        ])->findOrFail($id);

        $this->showModal = true;
    }

    public function close()
    {
        $this->showModal = false;
        $this->child = null;
    }
    public function render()
    {
        return view('livewire.modal.child.view');
    }
}
