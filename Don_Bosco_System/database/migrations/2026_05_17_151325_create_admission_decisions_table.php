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
        Schema::create('admission_decisions', function (Blueprint $table) {
            $table->id();
             $table->text('notes');
             $table->foreignId('user_id')->nullable()->references('id')->on('users')->nullOnDelete();
             $table->foreignId('student_application_id')->references('id')->on('student_applications') ->cascadeOnDelete();
              $table->string('reason');
             $table->enum('final_decision', [
    'accepted',   // مقبول
    'rejected',   // مرفوض
    'waiting'     // احتياط
]);

             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admission_decisions');
    }
};
