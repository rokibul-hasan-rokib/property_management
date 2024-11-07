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
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->decimal('rent', 8,2);
            $table->string('house_details');
            $table->integer('floor');
            $table->string('apartment');
            $table->integer('bed')->default(0);
            $table->integer('washroom')->default(0);
            $table->integer('belcony')->default(0);
            $table->integer('kitchen')->default(1);
            $table->tinyInteger('status')->nullable()->index()->comment('1=>booked,0=>availabe')->default(0);
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