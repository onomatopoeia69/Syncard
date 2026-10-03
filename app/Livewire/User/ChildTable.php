<?php

namespace App\Livewire\User;

use App\Models\ChildProfile;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ChildTable extends Component
{

     use WithPagination;
     
    public string $search = '';
    public string $status = 'all';

    #[On('child-added')]
    public function refreshTable()
    {
        $this->resetPage();
    }
    


    public function viewChild($id)
    {
        $this->dispatch('view-child', id: $id);
    }   

    public function openLocation($childId)
    {
        $this->dispatch('open-child-location', childId: $childId);
    }


    public function toggleLostMode($childId)
    {
        $child = ChildProfile::findOrFail($childId);

        $child->update([
            'lost_mode' => !$child->lost_mode,
        ]);

        $this->dispatch('lost-mode-updated');

        $this->dispatch('swal', [
            'title' => $child->lost_mode
                ? 'Lost Mode Activated'
                : 'Lost Mode Deactivated',
            'text' => $child->lost_mode
                ? "{$child->name} is now marked as lost."
                : "{$child->name} is no longer marked as lost.",
            'icon' => $child->lost_mode ? 'warning' : 'success',
        ]);
    }

    public function deleteChild($childId)
    {
        $child = ChildProfile::findOrFail($childId);

        $childName = $child->name;

        $child->delete();

        $this->dispatch('child-deleted');

        $this->dispatch('swal', [
            'title' => 'Child Deleted',
            'text' => "{$childName} has been deleted successfully.",
            'icon' => 'success',
        ]);
    }



    public function render()
    {

        $this->dispatch('init-lucide');

        $userId = auth()->id();

        $children = ChildProfile::query()
            ->with([
                'nfcTag.scans',
                'emergencyContacts',
            ])
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->when($this->status === 'lost', function ($query) {
                $query->where('lost_mode', true);
            })
            ->when($this->status === 'normal', function ($query) {
                $query->where('lost_mode', false);
            })
            ->where('user_id','=', $userId)
            ->latest()
            ->paginate(10);

        return view('livewire.user.child-table', [
            'children' => $children,
        ]);
    }

}
