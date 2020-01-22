<?php

namespace App\Http\Services;

use Auth;
use App\Traffic;
use Carbon\Carbon;

class TrafficService
{
	public static function getTraffic() {
		$this_year = Traffic::selectRaw('count(*) as total, MONTH(created_at) month')
		->where('created_at', '>', Carbon::now()->subMonths(7))
		->groupBy('month')
		->orderBy('created_at', 'ASC')
		->get()->toArray();
		$last_year = Traffic::selectRaw('count(*) as total, MONTH(created_at) month')
		->whereBetween('created_at', [Carbon::now()->subMonths(19), Carbon::now()->subMonths(12)])
		->groupBy('month')
		->orderBy('created_at', 'ASC')
		->get()->toArray();
		return ['this_year' => $this_year, 'last_year' => $last_year];
	}
	public static function getDevices() {
		$devices = Traffic::selectRaw("count(case when device = 'Computer' then 1 end) as Computers")
			->selectRaw("count(case when device = 'Mobile' then 1 end) as Mobiles")
			->selectRaw("count(case when device = 'Other' then 1 end) as Others")
			->first()->toArray();
		return $devices;
	}
	public static function getBrowsers() {
		$browsers = Traffic::selectRaw("count(case when browser = 'MSIE' then 1 end) as IE")
			->selectRaw("count(case when browser = 'Trident' then 1 else 0 end) as Trident")
			->selectRaw("count(case when browser = 'Firefox' then 1 end) as Firefox")
			->selectRaw("count(case when browser = 'Chrome' then 1 end) as Chrome")
			->selectRaw("count(case when browser = 'Opera Mini' then 1 end) as Opera_Mini")
			->selectRaw("count(case when browser = 'Opera' then 1 end) as Opera")
			->selectRaw("count(case when browser = 'Safari' then 1 end) as Safari")
			->selectRaw("count(case when browser = 'Other' then 1 end) as Other")
			->first()->toArray();
		return $browsers;
	}
}
