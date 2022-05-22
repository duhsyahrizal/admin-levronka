<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')
            ->onDelete('cascade');

            $table->string('title');
            $table->text('description');
            $table->string('attribute')->nullable();
            $table->string('detail')->nullable();
            $table->string('color')->nullable();
            $table->string('tag')->nullable();
            $table->integer('price');
            $table->string('image');
            $table->string('image_thumb');
            $table->string('image_detail_1')->nullable();
            $table->string('image_detail_2')->nullable();
            $table->string('image_detail_3')->nullable();
            $table->string('image_detail_4')->nullable();
            $table->string('online_shop_1')->nullable();
            $table->string('online_shop_2')->nullable();
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
        Schema::dropIfExists('products');
    }
}
