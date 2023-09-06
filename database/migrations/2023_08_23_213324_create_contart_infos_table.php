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
        Schema::create('contart_infos', function (Blueprint $table) {
            $table->id();
            $table->string('prefix');
            $table->string('ID_student');
            $table->string('ID_facebook');
            $table->string('ID_instagram');
            $table->string('ID_email');
            $table->string('ID_line');
            $table->string('telephone');
            $table->string('image');
            $table->string('attention');
            $table->boolean('status_contact')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contart_infos');
    }
};
