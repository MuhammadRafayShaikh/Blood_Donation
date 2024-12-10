<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('donors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('image')->nullable();
            $table->string('gender');
            $table->string('phone');
            $table->string('address')->nullable();
            $table->string('pin_code')->nullable();
            $table->foreignId('city_id')->constrained('cities');
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->foreignId('group_id')->constrained('groups');
            $table->string('email')->unique();
            $table->string('password')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donors');
    }
};
