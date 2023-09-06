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
        Schema::create('education_infoms', function (Blueprint $table) {
            $table->id();
            $table->string('ID_student');
            $table->string('School_name');
            $table->string('degree');
            $table->string('field_study');
            $table->string('faculty_study');
            $table->string('endyear');
            $table->decimal('gpa', 4, 2);
            $table->string('schooltype');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education_infoms');
    }
};
