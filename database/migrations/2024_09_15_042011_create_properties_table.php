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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('place');
            $table->string('image');
            $table->decimal('rent', 8,2);
            $table->string('house_details');
            $table->integer('floor');
            $table->string('apartment');
            $table->integer('bed')->default(0);
            $table->integer('washroom')->default(0);
            $table->integer('belcony')->default(0);
            $table->integer('kitchen')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
