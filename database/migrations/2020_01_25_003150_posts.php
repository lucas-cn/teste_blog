<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Posts extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('autor');
            $table->string('titulo');
            $table->text('conteudo');
            $table->timestamp('publicacao');
        });
    }
  
    public function down()
    {
        Schema::drop('posts');
    }
}
