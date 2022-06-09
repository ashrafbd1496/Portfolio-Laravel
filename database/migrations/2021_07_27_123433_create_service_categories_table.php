<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->enum('type', ['icon', 'image']);
            $table->text('service_category_image')->nullable();
            $table->string('icon')->nullable();
            $table->string('category_name')->unique();
            $table->string('title')->nullable();
            $table->text('desc')->nullable();
            $table->string('btn_name')->nullable();
            $table->text('btn_link')->nullable();
            $table->enum('image_status', ['show', 'hide'])->default('show');
            $table->text('service_image')->nullable();
            $table->integer('order')->default(0);
            $table->enum('status', ['published', 'draft'])->default('published');
            $table->string('service_category_slug');
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
        Schema::dropIfExists('service_categories');
    }
}
