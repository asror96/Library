<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_genre', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('genre_id');

            $table->index('book_id','book_genre_book_idx');
            $table->index('genre_id','genre_book_genre_idx');

            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('genre_id')->references('id')->on('genres');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_genre');
    }
};
