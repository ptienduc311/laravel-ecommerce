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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 120)->nullable();
            $table->string('phone', 12)->nullable();
            $table->string('locality', 120)->nullable();
            $table->string('address', 120)->nullable();
            $table->string('city', 120)->nullable();
            $table->string('country', 120)->nullable();
            $table->string('state', 120)->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
