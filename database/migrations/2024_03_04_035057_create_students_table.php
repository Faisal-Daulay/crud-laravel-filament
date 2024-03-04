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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nim')->unique();
            $table->string('name');
            $table->string('email');
            $table->string('address');
            $table->string('semester');
            $table->string('date_of_birth');
            $table->string('birthplace');
            $table->string('phone_number');
            $table->enum('religion', ['Islam', 'Kristen', 'Budha', 'Katolik']);
            $table->enum('program_of_study', ['Laboratory', 'Diagnostic', 'Therapeutic', 'ICT', 'Radiology']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
