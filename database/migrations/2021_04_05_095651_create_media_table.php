<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('title', 160)->nullable();
            $table->string('file');
            $table->string('url')->nullable();
            $table->integer('user_id');
            $table->integer('category_id')->nullable();
            $table->integer('post_id')->nullable();
            $table->integer('page_id')->nullable();
            $table->integer('article_id')->nullable();
            $table->integer('news_id')->nullable();
            $table->integer('profile_id')->nullable();
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
        Schema::dropIfExists('media');
    }
}
