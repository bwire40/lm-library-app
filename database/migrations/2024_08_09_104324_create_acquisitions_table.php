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
        Schema::create('acquisitions', function (Blueprint $table) {
            $table->id(); // primary key
            $table->string('email');
            $table->string('phone');
            $table->string('issue_date');
            $table->string('due_date');
            $table->string('return_date')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('guest_id')->constrained();
            $table->foreignId('book_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acquisitions');
    }
};