<?php

namespace App\Livewire\User;

use App\Models\ChildProfile;
use App\Models\NfcScan;
use App\Models\NfcTag;
use Livewire\Attributes\On;
use Livewire\Component;

class ChildDashboard extends Component
{
   
    public int $totalChildren = 0;
    public int $activeTags = 0;
    public int $lostChildren = 0;
    public int $totalScans = 0;

    #[On('child-added')]
    #[On('child-deleted')]
    #[On('lost-mode-updated')]
    public function refreshDashboard()
    {
        $this->loadStats();
    }

    public function mount()
    {
        $this->loadStats();
    }

    private function loadStats()
    { 
        $userId = auth()->id();

        $this->totalChildren = ChildProfile::where('user_id','=',$userId)->count();

       $this->activeTags = NfcTag::where('status', true)
        ->whereHas('child', function ($query) use ($userId) {
            $query->where('user_id', $userId); 
        })
        ->count();

        $this->lostChildren = ChildProfile::where(
            'lost_mode',
            true
        )
        ->where('user_id','=',$userId)
        ->count();

        $this->totalScans = NfcScan::whereHas('nfcTag.child.user', function($query) use ($userId){

            $query->where('user_id','=',$userId);
        })
        ->count();

         $this->dispatch('init-lucide');
    }

    public function render()
    {
        return view('livewire.user.child-dashboard');
    }
}
