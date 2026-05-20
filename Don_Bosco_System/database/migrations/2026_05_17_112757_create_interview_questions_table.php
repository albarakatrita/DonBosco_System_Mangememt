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
        Schema::create('interview_questions', function (Blueprint $table) {
            $table->id();
             $table->string('question_text');
             $table->enum('type',[
                  'text',
    'textarea',
    'number',
    'select',
    'radio',
    'checkbox',
    'file',
    'date',
    'email',
    'phone'
             ]

             )->default('text');
             $table->json('optione');
             $table->integer('order');
             $table->foreignId('course_interview')->references('id')->on('course_interviews')->cascadeOnDelete();
           //  $table->foreignId('user_id')->nullable()->references('id')->on('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interview_questions');
    }
};
