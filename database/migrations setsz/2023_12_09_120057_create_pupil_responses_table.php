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
        Schema::create('pupil_responses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pupil_id')->constrained('users');
            $table->foreignId('question_id')->constrained('questions');
            $table->foreignId('choice_id')->constrained('choices');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pupil_responses');
    }
};
