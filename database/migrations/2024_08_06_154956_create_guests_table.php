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
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique('email');
            $table->unsignedBigInteger('nationalId')->unsigned()->unique('nationalId');
            $table->string('userType')->default('guest');
            $table->string('status')->default('active');
            $table->unsignedBigInteger('phone')->unsigned()->unique('phone');
            $table->string('address');
            $table->text('image')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};
