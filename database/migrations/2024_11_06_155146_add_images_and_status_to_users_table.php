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
        Schema::table('users', function (Blueprint $table) {
            $table->string('image1')->nullable()->after('role');
            $table->string('image2')->nullable()->after('image1');
            $table->tinyInteger('status')->nullable()->index()->comment('1=>active,0=>inactive')->after('image2');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['image1', 'image2', 'status']);
        });
    }
};