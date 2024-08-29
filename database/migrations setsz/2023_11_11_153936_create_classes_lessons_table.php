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
        Schema::create('classes_lessons', function (Blueprint $table) {
            $table->id();
            $table->string('quarter');
            $table->string('title');
            $table->string('topic');
            $table->unsignedBigInteger('class_id');
            $table->foreign('class_id')->references('id')->on('add_classes')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes_lessons');
    }
};
