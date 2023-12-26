<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Накатить
     */
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('text');
            $table->string('answer');
            $table->string('difficultyLevel');
            $table->integer('cost');
            $table->timestamps();
        });
    }

    /**
     * Откатить
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
