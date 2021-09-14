<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsInOrderItemReturns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_item_returns', function (Blueprint $table) {
            $table->bigInteger('shiprocket_order_id')->after('product_variant_id')->nullable();
            $table->bigInteger('shiprocket_shipment_id')->after('shiprocket_order_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_item_returns', function (Blueprint $table) {
            $table->dropColumn(['shiprocket_order_id', 'shiprocket_shipment_id']);
        });
    }
}
