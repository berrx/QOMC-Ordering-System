<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAdminTables extends Migration
{
    public function getConnection()
    {
        return config('admin.database.connection') ?: config('database.default');
    }

    public function up()
    {
        Schema::table(config('admin.database.permissions_table'), function (Blueprint $table) {
            $table->integer('parent_id')->default(0);
            $table->integer('order')->default(0);
        });

        Schema::create(config('admin.database.permission_menu_table'), function (Blueprint $table) {
            $table->integer('permission_id');
            $table->integer('menu_id');
            $table->unique(['permission_id', 'menu_id']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table(config('admin.database.permissions_table'), function (Blueprint $table) {
            $table->dropColumn('parent_id');
            $table->dropColumn('order');
        });

        Schema::dropIfExists(config('admin.database.permission_menu_table'));
    }
}