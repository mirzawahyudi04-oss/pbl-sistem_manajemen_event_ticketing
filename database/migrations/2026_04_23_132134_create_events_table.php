<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category'); 
            $table->date('event_date');
            $table->string('location');
            $table->string('image');   
            $table->string('organizer'); // Nama EO
            $table->string('organizer_logo'); 
            $table->integer('price');
            $table->timestamps();
});
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};