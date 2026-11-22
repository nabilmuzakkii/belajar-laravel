<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('borrowings', function (Blueprint $table) {
        $table->id();

        $table->foreignId('member_id')
            ->constrained('members')
            ->restrictOnDelete();

        $table->foreignId('book_id')
            ->constrained('books')
            ->restrictOnDelete();

        $table->foreignId('user_id')
            ->constrained('users')
            ->restrictOnDelete();

        $table->date('borrowed_at');
        $table->date('due_date')->nullable();
        $table->date('returned_at')->nullable();

        $table->string('status')->default('dipinjam');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowings');
    }
};
