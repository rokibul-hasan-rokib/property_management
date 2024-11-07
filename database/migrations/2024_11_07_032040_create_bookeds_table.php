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
        Schema::create('bookeds', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('email');
            $table->string('phone');
            $table->tinyInteger('status')->nullable()->index()->comment('1=>accept,0=>pending','2=>rejected');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookeds');
    }
};
