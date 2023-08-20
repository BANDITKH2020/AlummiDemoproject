<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('addimages')) { // ตรวจสอบว่าตาราง 'images' ยังไม่มีอยู่
            Schema::create('addimages', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('newsandactivity_id');
                $table->string('image_path');
                $table->timestamps();

                $table->foreign('newsandactivity_id')
                    ->references('id')
                    ->on('newsandactivities')
                    ->onDelete('cascade');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('addimages');
    }

    
};
