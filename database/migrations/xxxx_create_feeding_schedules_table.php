public function up(): void
{
    Schema::create('feeding_schedules', function (Blueprint $table) {
        $table->id();
        $table->foreignId('pet_id')->constrained()->onDelete('cascade');
        $table->time('feeding_time');
        $table->string('food');
        $table->timestamps();
    });
}
