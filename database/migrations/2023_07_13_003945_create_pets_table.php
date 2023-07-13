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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('name');
            $table->string('specie');
            $table->string('sex');
            $table->string('age');
            $table->string('size');
            $table->string('state');
            $table->string('city');
            $table->string('main_photo');
            $table->text('description');
            $table->boolean('is_adopted');
            $table->boolean('is_visible');
            $table->boolean('has_special_needs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};