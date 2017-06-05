<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('article_type');
            $table->string('article_name');
            $table->string('user_comment');
            $table->string('comment');

            $table->unsignedInteger('article_id')->nullable();
            $table->foreign('article_id')->references('id')->on('details')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedInteger('audio_id')->nullable();
            $table->foreign('audio_id')->references('id')->on('listenings')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('comments');
    }
}
