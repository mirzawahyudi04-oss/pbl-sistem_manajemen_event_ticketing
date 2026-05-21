<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id('id_event');

            $table->foreignId('id_user')
                  ->constrained('users')
                  ->onDelete('cascade');

            $table->string('nama_event');
            $table->date('tanggal');
            $table->string('lokasi');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};