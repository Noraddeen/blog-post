<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commends', function (Blueprint $table) {
            $table->id()->unsigned()->autoIncrement();
            $table->unsignedbigInteger('user_id');
            $table->unsignedbigInteger('post_id');
            $table->string('commend',500);
            $table->timestamps();
            //  $table->foreignId('')->constrained();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commends');
    }
}
