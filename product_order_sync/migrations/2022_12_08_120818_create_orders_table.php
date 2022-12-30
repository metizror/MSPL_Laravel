<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('order_id');
            $table->string('browntape_order_id')->nullable();
            $table->string('email')->nullable();
            $table->string('note')->nullable();
            $table->string('token')->nullable();
            $table->string('financial_status')->nullable();
            $table->string('name')->nullable();
            $table->string('app_id')->nullable();
            $table->string('tags')->nullable();
            $table->integer('item_count')->nullable();
            $table->string('shopify_order_id')->nullable();
            $table->bigInteger('shopify_order_number')->unsigned();
            $table->string('shopify_line_item_id')->nullable();
            $table->string('shopify_product_id')->nullable();
            $table->string('shopify_variant_id')->nullable();
            $table->string('sku')->nullable();
            $table->string('product_name')->nullable();
            $table->integer('quantity')->unsigned()->nullable();
            $table->double('price', 8, 2)->nullable();
            $table->string('fulfillment_status')->nullable();
            $table->string('order_status')->nullable();
            $table->double('subtotal_price', 8, 2)->nullable();
            $table->double('total_discounts', 8, 2)->nullable()->default(0.00);
            $table->double('tax', 8, 2)->nullable()->default(0.00);
            $table->text('line_item_payload')->nullable();
            $table->integer('created_by')->length(4)->unsigned()->nullable();
            $table->integer('updated_by')->length(4)->unsigned()->nullable();
            $table->string('product_type')->nullable();
            $table->string('vendor')->nullable();
            $table->enum('is_push', ['0', '1', '2'])->default('0');
            $table->enum('is_shipping', ['0', '1'])->default('0');
            $table->longText('order_item_json')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
