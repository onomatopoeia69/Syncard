<?php

namespace App\Livewire\Modal\Child;

use App\Models\ChildProfile;
use Livewire\Attributes\On;
use Livewire\Component;

class OpenStreet extends Component
{
    public bool $showModal = false;

    public $child = null;
    public $latestScan = null;

   #[On('open-child-location')]
public function open($childId)
{
    $this->child = ChildProfile::with('nfcTag')
        ->findOrFail($childId);

    $this->latestScan = $this->child->nfcTag
        ?->scans()
        ->whereNotNull('latitude')
        ->whereNotNull('longitude')
        ->latest('scanned_at')
        ->first();

    $this->showModal = true;

    $this->dispatch(
        'location-map-ready',
        latitude: $this->latestScan->latitude,
        longitude: $this->latestScan->longitude
    );
}
    public function close()
    {
        $this->showModal = false;
        $this->child = null;
        $this->latestScan = null;
    }

    public function render()
    {
        return view('livewire.modal.child.open-street');
    }
}
