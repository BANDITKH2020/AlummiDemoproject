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
        Schema::create('language_skills', function (Blueprint $table) {
            $table->id();
            $table->string('ID_student');
            $table->string('language');
            $table->string('listening');
            $table->string('speaking');
            $table->string('reading');
            $table->string('writing');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('language_skills');
    }
};
