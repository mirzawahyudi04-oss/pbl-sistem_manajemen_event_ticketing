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
    Schema::table('events', function (Blueprint $table) {

        $table->foreign('id_kategori')
              ->references('id_kategori')
              ->on('kategori')
              ->onDelete('cascade');

    });
}

public function down()
{
    Schema::table('events', function (Blueprint $table) {

        $table->dropForeign(['id_kategori']);
        $table->dropColumn('id_kategori');

    });
}
};
