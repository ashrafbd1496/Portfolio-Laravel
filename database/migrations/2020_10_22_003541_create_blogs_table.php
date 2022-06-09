<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->string('category_name');
            $table->integer('category_id');
            $table->string('author_name')->nullable();
            $table->integer('user_id')->nullable();
            $table->text('title');
            $table->text('desc')->nullable();
            $table->text('short_desc')->nullable();
            $table->enum('image_status', ['show', 'hide'])->default('show');
            $table->text('blog_image')->nullable();
            $table->enum('type', ['with_this_account', 'anonymous']);
            $table->text('slug');
            $table->integer('view')->default(0);
            $table->enum('status', ['published', 'draft'])->default('published');
            $table->text('tag')->nullable();
            $table->text('meta_desc')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->enum('breadcrumb_status', ['yes', 'no'])->default('no');
            $table->text('custom_breadcrumb_image')->nullable();
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
        Schema::dropIfExists('blogs');
    }
}
