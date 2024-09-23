<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('pokemons', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->string('name');
            $table->float('height');
            $table->float('weight');
            $table->string('thumbnail_alt_text');
            $table->string('thumbnail_image');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pokemons');
    }
};
