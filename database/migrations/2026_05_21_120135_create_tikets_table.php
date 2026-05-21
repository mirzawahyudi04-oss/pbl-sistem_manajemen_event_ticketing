<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tikets', function (Blueprint $table) {
            $table->id('id_tiket');

            $table->unsignedBigInteger('id_event');

            $table->string('nama_tiket');
            $table->decimal('harga', 10, 2);
            $table->integer('kuota');

            $table->timestamps();

            $table->foreign('id_event')
                  ->references('id_event')
                  ->on('events')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tikets');
    }
};