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
        Schema::create('massages', function (Blueprint $table) {
            $table->id();
            $table->string('ID_student');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('massage_name');
            $table->text('massage_cotent');
            $table->boolean('status_massage')->default(false);
            $table->boolean('status_read')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('massages');
    }
};
