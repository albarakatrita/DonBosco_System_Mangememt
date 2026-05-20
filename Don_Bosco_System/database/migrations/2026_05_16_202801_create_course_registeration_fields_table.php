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
        Schema::create('course_registeration_fields', function (Blueprint $table) {
            $table->id();
            $table->string('name');
          $table->enum('type', [
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
]);
 $table->boolean('required')->default(true);
 $table->integer('order');
 $table->json('options');
 $table->string('placeholder');
 //$table->boolean('is_active');
 $table->foreignId('form_id')->references('id')->on('forms')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_registeration_fields');
    }
};
