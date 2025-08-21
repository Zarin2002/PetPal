public function up(): void
{
    Schema::create('reminders', function (Blueprint $table) {
        $table->id();
        $table->foreignId('pet_id')->constrained()->onDelete('cascade');
        $table->string('title');
        $table->date('reminder_date');
        $table->text('notes')->nullable();
        $table->timestamps();
    });
}
