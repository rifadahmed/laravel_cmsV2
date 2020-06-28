<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_replies', function (Blueprint $table) {
            $table->increments('id');
            //as our foreing(comment_id) key is unsigned() we have to make
            // primary key same unsigned() as foreign key
            $table->integer('comment_id')->unsigned();
            $table->integer('is_active')->default(0);
            $table->string('author');
            $table->string('email');
            $table->string('body');
            $table->timestamps();
            $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comment_replies');
    }
}
