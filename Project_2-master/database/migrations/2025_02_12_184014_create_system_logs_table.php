<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemLogsTable extends Migration
{
    public function up()
    {
        Schema::create('system_logs', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->string('event'); // เหตุการณ์ที่เกิดขึ้น เช่น "User Login"
            $table->enum('type', ['INFO', 'ERROR', 'WARNING'])->default('INFO'); // <-- เพิ่มคอลัมน์นี้
            $table->text('description')->nullable();
            $table->ipAddress('ip_address')->nullable();
            $table->timestamps();

            // Foreign Key เชื่อมกับตาราง users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('system_logs');
    }
}