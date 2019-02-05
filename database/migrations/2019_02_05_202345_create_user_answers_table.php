<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_answers', function (Blueprint $table) {
            $table->integer('userId');
            $table->integer('answerId');
            $table->integer('questionId');
            $table->enum('importance', ['low', 'medium', 'high']);
            $table->index(['userId', 'answerId', 'questionId']);
            $table->foreign('userId')->references('id')->on('users');
            $table->foreign(['answerId', 'questionId'])->references(['answerId', 'questionId'])->on('answers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_answers');
    }
}
