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
        Schema::create('course_interviews', function (Blueprint $table) {
            $table->id();
             $table->text('description');
             $table->foreignId('course_id')->references('id')->on('courses')->cascadeOnDelete();
             $table->foreignId('user_id')->nullable()->references('id')->on('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_interviews');
    }
};
