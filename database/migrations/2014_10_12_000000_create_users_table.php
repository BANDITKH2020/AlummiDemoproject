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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('google_id')->nullable();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('student_id');
            $table->string('student_grp');
            $table->string('graduatesem');//ปีการศึกษา
            $table->string('role_acc');
            $table->string('educational_status');
            $table->string('inviteby');//อาจารย์ที่เพิ่ม
            $table->string('groupleader');//หัวหน้าห้อง
            $table->boolean('active')->default(true);
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
