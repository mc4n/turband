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
        Schema::create('word_definitions', function (Blueprint $table) {
            $table->id();
            $table->string('word', 48)->index('word-text');
            $table->string('definition', 512);
            $table->text('example', 1024)->nullable();
            $table->integer('user_id')->unsigned()->index("word-user")->nullable();
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
        Schema::dropIfExists('word_definitions');
    }
};