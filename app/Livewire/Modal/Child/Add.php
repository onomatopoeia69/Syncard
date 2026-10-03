<?php

namespace App\Livewire\Modal\Child;

use App\Models\ChildEmergencyContact;
use App\Models\ChildProfile;
use App\Models\NfcTag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Add extends Component
{
     use WithFileUploads;

    public bool $showModal = false;

    /*
    |--------------------------------------------------------------------------
    | Child Information
    |--------------------------------------------------------------------------
    */

    public $photo;

    public string $name = '';
    public string $date_of_birth = '';
    public string $gender = '';
    public string $blood_type = '';


    public string $allergies = '';
    public string $medical_notes = '';

    public string $address = '';
 

    public string $emergency_name = '';
    public string $emergency_relationship = '';
    public string $emergency_phone = '';

 

    public string $tag_uid = '';


    #[On('open-add-child')]
    public function openModal()
    {
        $this->resetForm();

        $this->showModal = true;
 
        $this->dispatch('init-lucide');

    }

 

    public function closeModal()
    {
        $this->showModal = false;

        $this->resetForm();
    }

 

    protected function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'photo' => [
                'nullable',
                'image',
                'max:2048',
            ],

            'date_of_birth' => [
                'nullable',
                'date',
            ],

            'gender' => [
                'nullable',
                'string',
                'max:50',
            ],

            'blood_type' => [
                'nullable',
                'string',
                'max:20',
            ],
            'allergies' => [
                'nullable',
                'string',
            ],

            'medical_notes' => [
                'nullable',
                'string',
            ],
            'emergency_name' => [
                'required',
                'string',
                'max:255',
            ],

            'emergency_relationship' => [
                'required',
                'string',
                'max:100',
            ],

            'emergency_phone' => [
                'required',
                'string',
                'max:30',
            ],
            'tag_uid' => [
                'required',
                'string',
                'max:255',
                'unique:child_nfc_tags,tag_uid',
            ],

            'address' => ['nullable', 'string', 'max:1000'],
        ];
    }


    public function save()
    {
        $validated = $this->validate();

        DB::transaction(function () use ($validated) {

         

            $photoPath = null;

            if ($this->photo) {
                $photoPath = $this->photo->store(
                    'children',
                    'public'
                );
            }

         

            $child = ChildProfile::create([
                'user_id' => Auth::id(),

                'name' => $validated['name'],

                'photo' => $photoPath,

                'address' => $validated['address'] ?: null,

                'date_of_birth' =>
                    $validated['date_of_birth'] ?: null,

                'gender' =>
                    $validated['gender'] ?: null,

                'blood_type' =>
                    $validated['blood_type'] ?: null,

                'allergies' =>
                    $validated['allergies'] ?: null,

                'medical_notes' =>
                    $validated['medical_notes'] ?: null,

                'lost_mode' => false,
            ]);

        
            ChildEmergencyContact::create([
                'child_id' => $child->id,

                'name' =>
                    $validated['emergency_name'],

                'relationship' =>
                    $validated['emergency_relationship'],

                'phone' =>
                    $validated['emergency_phone'],

                'is_primary' => true,
            ]);

       
            NfcTag::create([
                'child_id' => $child->id,

                'tag_uid' =>
                    $validated['tag_uid'],

                'public_token' =>
                    Str::random(32),

                'status' => true,
            ]);
        });

     

        $this->showModal = false;

        $this->resetForm();

        $this->dispatch('child-added');

        $this->dispatch('swal', [
            'title' => 'Child Added!',
            'text' =>
                'The child profile, emergency contact, and NFC tag were successfully added.',
            'icon' => 'success',
        ]);
    }


    private function resetForm()
    {
        $this->reset([
            'photo',
            'name',
            'date_of_birth',
            'gender',
            'blood_type',
            'address',
            'allergies',
            'medical_notes',
            'emergency_name',
            'emergency_relationship',
            'emergency_phone',
            'tag_uid',
        ]);

        $this->resetValidation();
    }



    public function render()
    {
        return view('livewire.modal.child.add');
    }
}
