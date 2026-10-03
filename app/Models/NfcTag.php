<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NfcTag extends Model
{
    use HasFactory;
 
    protected $table = 'child_nfc_tags';

    protected $fillable = [
        'child_id',
        'tag_uid',
        'public_token',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function child()
    {
        return $this->belongsTo(
            ChildProfile::class,
            'child_id'
        );
    }

    public function scans()
    {
        return $this->hasMany(
              NfcScan::class,
            'nfc_tag_id'
        );
    }

}
