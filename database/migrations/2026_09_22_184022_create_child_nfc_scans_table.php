<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('child_nfc_scans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('nfc_tag_id')
                ->constrained('child_nfc_tags')
                ->cascadeOnDelete();

            $table->ipAddress('ip_address')->nullable();
            $table->text('user_agent')->nullable();

            $table->timestamp('scanned_at');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('child_nfc_scans');
    }
};
