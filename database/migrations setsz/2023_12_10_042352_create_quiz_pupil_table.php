<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizPupilTable extends Migration
{
    public function up()
    {
        Schema::create('quiz_pupil', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pupil_id')->constrained('users');
            $table->foreignId('quiz_id')->constrained('quizzes');
            $table->integer('score')->nullable(); // Adjust based on your scoring system
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('quiz_pupil');
    }

};
