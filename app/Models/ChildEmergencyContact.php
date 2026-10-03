<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildEmergencyContact extends Model
{
    use HasFactory;

    protected $table = 'child_emergency_contacts';

     protected $fillable = [
        'child_id',
        'name',
        'relationship',
        'phone',
        'is_primary',
    ];

    protected $casts = [
        'is_primary' => 'boolean',
    ];

    public function child()
    {
        return $this->belongsTo(
            ChildProfile::class,
            'child_id'
        );
    }
}
