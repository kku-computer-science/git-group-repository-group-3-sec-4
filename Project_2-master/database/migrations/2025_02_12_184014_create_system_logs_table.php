<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemLogsTable extends Migration
{
    public function up()
    {
        Schema::create('system_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->string('event'); // เช่น "User Login", "Update Data"
            $table->string('type')->nullable(); // ประเภทของเหตุการณ์ เช่น ERROR, INFO
            $table->text('description')->nullable(); // คำอธิบายเพิ่มเติม
            $table->ipAddress('ip_address')->nullable(); // IP ของผู้ใช้
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('system_logs');
    }
}
