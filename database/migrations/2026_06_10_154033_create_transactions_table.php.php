<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('transactions')) {
            Schema::create('transactions', function (Blueprint $table) {

                $table->id();

                $table->foreignId('user_id')
                    ->constrained()
                    ->onDelete('cascade');

                $table->unsignedBigInteger('event_id');

                $table->foreign('event_id')
                    ->references('id_event')
                    ->on('events')
                    ->onDelete('cascade');

                $table->string('ticket_type')->nullable();
                $table->integer('qty');
                $table->bigInteger('total_price');

                $table->string('payment_method');
                $table->string('payment_proof')->nullable();

                $table->string('status')->default('pending');

                $table->timestamps();
            });
        }
        
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};