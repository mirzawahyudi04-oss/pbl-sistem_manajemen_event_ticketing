public function up(): void
{
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

        // 🔥 PAYMENT SYSTEM
        $table->string('ticket_type')->nullable();

        $table->integer('qty');

        $table->bigInteger('total_price');

        $table->string('payment_method'); 
        // dana | gopay | mandiri

        $table->string('payment_proof')->nullable(); 
        // file bukti transfer

        $table->string('status')->default('pending'); 
        // pending | paid | rejected

        $table->timestamps();
    });
}