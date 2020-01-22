<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
			$table->string('password');
			$table->string('phone', 30)->nullable();
			$table->integer('role_id')->unsigned()->index()->default(1);
			$table->string('name_on_card')->nullable();
			$table->string('credit_card')->nullable();
			$table->integer('payment_id')->unsigned()->index()->nullable();
			$table->integer('card_exp_month')->nullable();
			$table->integer('card_exp_year')->nullable();
			$table->integer('cvv')->nullable();
            $table->string('address')->nullable();
			$table->integer('region_id')->unsigned()->index()->nullable();
			$table->integer('union_id')->unsigned()->index()->nullable();
			$table->integer('upazila_id')->unsigned()->index()->nullable();
			$table->integer('district_id')->unsigned()->index()->nullable();
			$table->integer('division_id')->unsigned()->index()->nullable();
			$table->string('billing_address')->nullable();
			$table->integer('billing_region_id')->unsigned()->index()->nullable();
			$table->integer('billing_union_id')->unsigned()->index()->nullable();
			$table->integer('billing_upazila_id')->unsigned()->index()->nullable();
			$table->integer('billing_district_id')->unsigned()->index()->nullable();
			$table->integer('billing_division_id')->unsigned()->index()->nullable();
			$table->string('shipping_address')->nullable();
			$table->integer('shipping_region_id')->unsigned()->index()->nullable();
			$table->integer('shipping_union_id')->unsigned()->index()->nullable();
			$table->integer('shipping_upazila_id')->unsigned()->index()->nullable();
			$table->integer('shipping_district_id')->unsigned()->index()->nullable();
			$table->integer('shipping_division_id')->unsigned()->index()->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
