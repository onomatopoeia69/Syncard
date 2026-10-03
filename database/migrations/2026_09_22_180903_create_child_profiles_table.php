<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('child_profiles', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('name');
            $table->string('photo')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('gender')->nullable();

            $table->string('blood_type')->nullable();
            $table->text('allergies')->nullable();
            $table->text('medical_notes')->nullable();

            $table->boolean('lost_mode')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('child_profiles');
    }
};