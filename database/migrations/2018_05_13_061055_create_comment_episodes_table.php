<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_episodes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('episode_id');
            $table->unsignedInteger('user_id');
            $table->text('comment');
            $table->timestamps();

            $table->foreign('episode_id')->references('id')->on('episodes')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment_episodes');
    }
}
