<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('book_name');

            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')
                ->references('id')->on('Authors');

            $table->unsignedBigInteger('genre_id');
            $table->foreign('genre_id')
                ->references('id')->on('Genres');

            $table->unsignedBigInteger('image_id');
            $table->foreign('image_id')
                ->references('id')->on('Images');
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
        Schema::table('books', function (Blueprint $table){
            $table->dropForeign('Books_aurthor_id_foreign');
            $table->dropColumn('author_id');
            $table->dropForeign('Books_genre_id_foreign');
            $table->dropColumn('genre_id');
            $table->dropForeign('Books_image_id_foreign');
            $table->dropColumn('image_id');
        });
    }
}
