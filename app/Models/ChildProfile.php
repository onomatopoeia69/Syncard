<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildProfile extends Model
{
    use HasFactory;

    protected $table = 'child_profiles';

    protected $fillable = [
        'user_id',
        'name',
        'photo',
        'address',
        'date_of_birth',
        'gender',
        'blood_type',
        'allergies',
        'medical_notes',
        'lost_mode',
    ];


      protected $casts = [
        'date_of_birth' => 'date',
        'lost_mode' => 'boolean',
    ];

       public function user()                                                                           
    {
        return $this->belongsTo(User::class);
    }

    public function nfcTag()
    {
        return $this->hasOne(NfcTag::class, 'child_id');
    }

    public function emergencyContacts()
    {
        return $this->hasMany(
            ChildEmergencyContact::class,
            'child_id'
        );
    }



}
