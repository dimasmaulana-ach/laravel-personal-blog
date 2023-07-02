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
        Schema::create('blogs', function (Blueprint $tbl) {
            $tbl->id();
            $tbl->foreignId('user_id');
            $tbl->foreignId('category_id');
            $tbl->string('title');
            $tbl->string('image')->nullable();
            $tbl->string('slug')->unique();
            $tbl->text('body');
            $tbl->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
