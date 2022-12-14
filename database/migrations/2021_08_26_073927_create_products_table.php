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
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->string('link_identifier')->nullable();
            $table->string('item_name')->nullable();
            $table->string('item_shade_name')->nullable();
            $table->string('slug')->nullable();
            $table->string('brand_name')->nullable();
            $table->string('main_cat_name')->nullable();
            $table->string('cat_name')->nullable();
            $table->string('sub_cat_name')->nullable();
            $table->string('hsn')->nullable();
            $table->integer('gst')->nullable();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->string('sku')->nullable();
            $table->string('hex_code')->nullable();
            $table->string('p_type')->nullable();
            $table->string('variation')->nullable();
            $table->string('discount_type')->nullable();
            $table->float('discount')->nullable();
            $table->float('regular_price')->nullable();
            $table->float('sale_price')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('og_title')->nullable();
            $table->text('og_description')->nullable();
            $table->text('og_image')->nullable();
            $table->text('tags')->nullable();
            $table->string('label_name')->nullable();
            $table->bigInteger('lastmodifycode')->nullable();
            $table->integer('sequence')->nullable();
            $table->string('ecom')->nullable();
            $table->tinyInteger('status')->default('0');
            $table->tinyInteger('flag')->default('0');
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
