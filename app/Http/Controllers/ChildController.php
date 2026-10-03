<?php

namespace App\Http\Controllers;

use App\Models\NfcScan;
use App\Models\NfcTag;
use Illuminate\Http\Request;

class ChildController extends Controller
{
     public function show($token)
    {
        $tag = NfcTag::with([
            'child.emergencyContacts',
        ])
        ->where('public_token', $token)
        ->where('status', true)
        ->firstOrFail();

        $scan = NfcScan::create([
            'nfc_tag_id' => $tag->id,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'scanned_at' => now(),
        ]);

        $child = $tag->child;

        return view('users.child.show', compact('child', 'scan'));
    }
}
