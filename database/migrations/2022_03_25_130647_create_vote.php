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
        Schema::create('votes', function (Blueprint $table) {
            $table->id();

            $table->boolean('is_like')->default(1)->index("vote-like_or_dislike");

            $table->integer('word_definition_id')->unsigned()->index("vote-word_definition");
            $table->foreign('word_definition_id')->references('id')->on('word_definitions');

            $table->integer('user_id')->unsigned()->index("vote-user");
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('votes');
    }
};
