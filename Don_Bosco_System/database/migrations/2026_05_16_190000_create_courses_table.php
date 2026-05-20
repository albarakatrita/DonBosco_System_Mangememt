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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->date('start_date');
            $table->integer('required_number');
            $table->boolean('has_interview');
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->nullOnDelete();
         $table->foreignId('donor_id')->references('id')->on('donors')->cascadeOnDelete();
  $table->foreignId('course_status_id')->nullable()->references('id')->on('course_statuses')->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
