<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
			$table->integer('payment_id')->unsigned()->index()->default(1);
			$table->bigInteger('customer_id')->nullable()->unsigned()->index();
			$table->bigInteger('shipper_id')->nullable()->unsigned()->index();
			$table->integer('order_status_id')->nullable()->unsigned()->index();
			$table->timestamp('required_at')->nullable();
			$table->timestamp('shipping_date')->nullable();
			$table->timestamp('paid_at')->nullable();
			$table->integer('discount')->unsigned()->default(0);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
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
