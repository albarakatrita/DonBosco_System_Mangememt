<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Livewire\on;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student_interviews', function (Blueprint $table) {
            $table->id();
            $table->date('interview_date');
            $table->time('interview_time');
$table->enum('status', [
    'scheduled',   // مقابلة مجدولة
    'cancelled',   // مقابلة ملغاة
    'completed'])->default('scheduled');
    $table->text('notes');
    $table->string('rating');
    $table->foreignId('user_id')->nullable()->references('id')->on('users')->nullOnDelete();
   // $table->foreignId()
   $table->foreignId('course_interview_id')->references('id')->on('course_interviews')->cascadeOnDelete();
 $table->foreignId('student_id')->references('id')->on('students')->cascadeOnDelete();

        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_interviews');
    }
};
