<?php

namespace App\Livewire\User;


use App\Models\NfcScan;
use Livewire\Component;

class ShowInfo extends Component
{
    public $child;
    public $scan;
    

    public function mount($child, $scan)
    {
        $this->child = $child;
        $this->scan = $scan;
    }

    public function refreshChild()
    {
        $this->child->refresh();
    }

    public function updateLocation($latitude, $longitude)
    {
        $scan = NfcScan::findOrFail($this->scan->id);

        $scan->update([
            'latitude' => $latitude,
            'longitude' => $longitude,
        ]);

        $this->scan->refresh();
    }

    public function render()
    {
        return view('livewire.user.show-info');
    }
}
