<?php

namespace App\Http\Services;

use Auth;
use App\Order;
use Carbon\Carbon;

class OrderService
{
	public static function getReport() {
		$report = Order::selectRaw('count(*)as total')
		->selectRaw('count(case when order_status_id = 3 then 1 end) as incomplete')
		->selectRaw('count(case when order_status_id = 4 then 1 end) as sale')
		->first();
		return $report;
	}
}
