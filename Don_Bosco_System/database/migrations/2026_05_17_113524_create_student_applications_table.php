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
        Schema::create('student_applications', function (Blueprint $table) {
            $table->id();
     $table->enum('status', [
    'new',                 // جديد
    'under_review',        // قيد المراجعة
    'eligible_for_interview', // مؤهل للمقابلة
    'contacted',           // تم التواصل
    'interview_scheduled'  // مقابلة مجدولة
])->default('new');

$table->string('application_name');
$table->foreignId('form_id')->nullable()->references('id')->on('forms')->nullOnDelete();
$table->foreignId('student_id')->references('id')->on('students')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_applications');
    }
};
