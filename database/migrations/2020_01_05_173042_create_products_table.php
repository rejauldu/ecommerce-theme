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
			$table->string('sku', 20)->nullable();
			$table->string('name', 100);
			$table->text('description')->nullable();
			$table->bigInteger('supplier_id')->nullable()->unsigned()->index();
			$table->string('category_id')->nullable();
			$table->tinyInteger('quantity_per_unit');
			$table->string('msrp');
			$table->integer('size_id')->nullable()->unsigned()->index();
			$table->integer('color_id')->nullable()->unsigned()->index();
			$table->integer('discount');
			$table->integer('weight');
			$table->integer('stock');
			$table->integer('unit_on_order');
			$table->integer('reorder_level');
			$table->tinyInteger('is_available');
			$table->tinyInteger('discount_available');
			$table->string('picture', 30)->nullable();
			$table->integer('ranking');
			$table->text('note');
			$table->timestamp('deleted_at');
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
