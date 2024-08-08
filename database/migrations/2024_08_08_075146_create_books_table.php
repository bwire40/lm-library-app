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
        Schema::create('books', function (Blueprint $table) {
            // title, genre author date_publishing isAvailable description user_id genre_id copies of the book
            $table->id();
            $table->string('book_code')->unique();
            $table->string('title');
            $table->string('genre');
            $table->string('author');
            $table->string('date_published');
            $table->string('is_available')->default('yes');
            $table->text('image')->nullable();
            $table->text('description');
            $table->unsignedInteger('copies_number');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('genre_id')->constrained()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};