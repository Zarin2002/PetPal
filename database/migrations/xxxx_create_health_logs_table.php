public function up(): void
{
    Schema::create('health_logs', function (Blueprint $table) {
        $table->id();
        $table->foreignId('pet_id')->constrained()->onDelete('cascade');
        $table->string('title');
        $table->date('date');
        $table->text('notes')->nullable();
        $table->timestamps();
    });
}
