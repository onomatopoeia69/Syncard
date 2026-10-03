<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NfcScan extends Model
{
    use HasFactory;

    protected $table = 'child_nfc_scans';

    protected $fillable = [
        'nfc_tag_id',
        'ip_address',
        'user_agent',
        'scanned_at',
        'latitude',
        'longitude',
        'address',
    ];

    protected $casts = [
        'scanned_at' => 'datetime',
    ];

    public function nfcTag()
    {
        return $this->belongsTo(
            NfcTag::class,
            'nfc_tag_id'
        );
    }
}
