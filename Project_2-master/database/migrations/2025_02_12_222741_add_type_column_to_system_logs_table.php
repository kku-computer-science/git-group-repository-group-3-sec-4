<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('system_logs', function (Blueprint $table) {
            $table->enum('type', ['INFO', 'ERROR', 'WARNING'])->default('INFO')->after('event');
        });
    }

    public function down()
    {
        Schema::table('system_logs', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
};