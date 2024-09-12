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
            // $table->string('book_code');
            $table->string('title');
            $table->string('genre');
            $table->string('author');
            $table->text('image')->nullable();
            $table->string('isbn');
            $table->unsignedInteger('year_of_publishing');
            $table->string('publisher');
            $table->string('edition');
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
