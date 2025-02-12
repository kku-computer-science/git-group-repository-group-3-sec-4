<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemLogsTable extends Migration
{
    public function up()
    {
        Schema::create('system_logs', function (Blueprint $table) {
            $table->id(); // ID หลักของ Log
            $table->unsignedBigInteger('user_id')->nullable()->index(); // User ที่กระทำ
            $table->string('event'); // เหตุการณ์ที่เกิดขึ้น เช่น "User Login"
            $table->text('description')->nullable(); // คำอธิบายเพิ่มเติม
            $table->ipAddress('ip_address')->nullable(); // เก็บ IP ของผู้ใช้งาน
            $table->timestamps(); // created_at และ updated_at อัตโนมัติ

            // เชื่อมกับตาราง users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('system_logs');
    }
}
