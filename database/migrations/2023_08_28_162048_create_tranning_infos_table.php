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
        Schema::create('tranning_infos', function (Blueprint $table) {
            $table->id();
            $table->string('ID_student');
            $table->string('Certi_name');
            $table->string('Organize_name');
            $table->date('startdate');
            $table->date('enddate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tranning_infos');
    }
};
