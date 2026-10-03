<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('child_emergency_contacts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('child_id')
                ->constrained('child_profiles')
                ->cascadeOnDelete();

            $table->string('name');
            $table->string('relationship')->nullable();
            $table->string('phone');
            $table->boolean('is_primary')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('child_emergency_contacts');
    }
};