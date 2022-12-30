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
            $table->string('product_id');
            $table->string('variant_id')->nullable();
            $table->string('inventory_item_id')->nullable();
            $table->string('price')->nullable();
            $table->string('compare_at_price')->nullable();
            $table->string('percentage')->nullable();
            $table->string('price_tag')->nullable();
            $table->string('tag')->nullable();
            $table->string('sku')->nullable();
            $table->string('title')->nullable();
            $table->string('handle')->nullable();
            $table->string('graphql_product_id')->nullable();
            $table->longText('body_html')->nullable();
            $table->string('vendor')->nullable();
            $table->string('product_type')->nullable();
            $table->longText('images')->nullable();
            $table->longText('data_json')->nullable();
            $table->tinyInteger('is_continue_selling')->length(4)->default(0)->nullable();
            $table->tinyInteger('is_active')->length(4)->default(1)->nullable();
            $table->dateTime('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
