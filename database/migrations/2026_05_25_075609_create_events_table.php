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

    $table->foreignId('id_organizer')
          ->constrained('organizers', 'id_organizer')
          ->onDelete('cascade');

    $table->string('nama_event');
    $table->text('deskripsi');      
    $table->date('tanggal');
    $table->string('lokasi');

    $table->timedatestamps();
});
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};