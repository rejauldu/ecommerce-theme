<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
			$table->string('company_name', 50);
			$table->string('contact_name', 50)->nullable();
			$table->string('address1', 150)->nullable();
			$table->string('address2', 150)->nullable();
			$table->integer('division_id')->nullable()->unsigned()->index();
			$table->integer('district_id')->nullable()->unsigned()->index();
			$table->integer('upazila_id')->nullable()->unsigned()->index();
			$table->integer('union_id')->nullable()->unsigned()->index();
			$table->integer('region_id')->nullable()->unsigned()->index();
			$table->string('phone', 20)->nullable();
			$table->string('fax', 50)->nullable();
			$table->string('email', 50)->nullable();
			$table->string('website', 60)->nullable();
			$table->integer('payment_id')->unsigned()->index();
			$table->string('discount_type', 100)->nullable();
			$table->integer('discount_percentage')->nullable()->default(0);
			$table->integer('category_id')->unsigned()->index();
			$table->tinyInteger('discount_available')->nullable()->default(0);
			$table->bigInteger('user_id')->unsigned()->index();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->string('logo', 255)->nullable();
			$table->integer('ranking')->nullable()->default(0);
			$table->text('note')->nullable();
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
        Schema::dropIfExists('suppliers');
    }
}
