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
        Schema::create('newsandactivities', function (Blueprint $table) {
            $table->id();
            $table->string('title_name');
            $table->text('cotent');
            $table->string('title_image');
            $table->string('category');
            $table->string('objective');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('newsandactivities');
    }
};
