<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrafficTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traffic', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->bigInteger('user_id')->nullable()->unsigned()->index();
			$table->string('ip', 40)->nullable();
			$table->float('latitude', 10, 7)->nullable();
			$table->float('longitude', 11, 7)->nullable();
			$table->string('browser', 30)->nullable();
			$table->string('browser_version', 20)->nullable();
			$table->string('platform', 20)->nullable();
			$table->string('device', 30)->nullable();
			$table->string('visited_page', 50)->nullable();
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
        Schema::dropIfExists('traffic');
    }
}
