<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->longtext('content')->nullable();
            $table->string('photo')->nullable();
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('brand_id')->unsigned()->nullable();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->integer('maker_id')->unsigned()->nullable();
            $table->foreign('maker_id')->references('id')->on('makers')->onDelete('cascade');
            $table->integer('color_id')->unsigned()->nullable();
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');
            $table->string('size')->nullable();
            $table->integer('size_id')->unsigned()->nullable();
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');
            $table->string('weight')->nullable();
            $table->integer('weight_id')->unsigned()->nullable();
            $table->foreign('weight_id')->references('id')->on('weights')->onDelete('cascade');
            $table->integer('currency_id')->unsigned()->nullable();
            $table->foreign('currency_id')->references('id')->on('countries')->onDelete('cascade');
            $table->integer('stock')->default(0);
            $table->decimal('price', 7, 2)->default(0);
            $table->decimal('price_offre', 7, 2)->default(0);
            $table->date('offre_start_at')->nullable();
            $table->date('offre_end_at')->nullable();
            $table->enum('status',['active', 'inactive'])->default('inactive');
            $table->longtext('other_info')->nullable();
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
