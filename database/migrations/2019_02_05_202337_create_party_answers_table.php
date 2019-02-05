<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartyAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('party_answers', function (Blueprint $table) {
            $table->integer('partyId');
            $table->integer('answerId');
            $table->integer('questionId');
            $table->text('explanation');
            $table->index(['partyId', 'answerId', 'questionId']);
            $table->foreign('partyId')->references('id')->on('parties');
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
        Schema::dropIfExists('party_answers');
    }
}
