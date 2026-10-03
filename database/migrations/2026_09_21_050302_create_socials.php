<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('socials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');
            $table->string('platform');
            $table->string('username')->nullable();
            $table->string('url');
            $table->string('label')->nullable();
            $table->string('icon')->nullable();
            $table->boolean('is_visible')->default(true);
            $table->boolean('is_verified')->default(false);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamp('verified_at')->nullable();
            $table->timestamps();
            $table->unique(['user_id', 'platform']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('socials');
    }
};
