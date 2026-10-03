<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('child_nfc_tags', function (Blueprint $table) {
            $table->id();

           
            $table->foreignId('child_id')
                ->unique()
                ->constrained('child_profiles')
                ->cascadeOnDelete();

            $table->string('tag_uid')->unique();

            
            $table->string('public_token')->unique();

         
            $table->boolean('status')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('child_nfc_tags');
    }
};