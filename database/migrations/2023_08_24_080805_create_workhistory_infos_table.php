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
        Schema::create('workhistory_infos', function (Blueprint $table) {
            $table->id();
            $table->string('ID_student');
            $table->date('startdate');
            $table->date('enddate');
            $table->string('Company_name');
            $table->string('position');
            $table->string('salary');
            $table->string('Company_add');
            $table->string('desctiption');
            $table->string('worktype');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workhistory_infos');
    }
};
