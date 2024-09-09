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
        Schema::create('student', function (Blueprint $table) {
            $table->integer('student_id',9)->primary();  
            $table->string('first_name');
            $table->string('middle_name')->nullable(); 
            $table->string('last_name');
            $table->string('email')->unique(); 
            $table->string('address');
            $table->string('gender', 6);  
            $table->string('birthdate');    
            $table->timestamps();  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student');
    }
};
