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
        Schema::create('student_interview_answers', function (Blueprint $table) {
            $table->id();
            $table->string('answer');
            $table->foreignId('interview_question_id')->references('id')->on('interview_questions')->cascadeOnDelete();
            $table->foreignId('student_interview_id')->references('id')->on('student_interviews')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_interview_answers');
    }
};
