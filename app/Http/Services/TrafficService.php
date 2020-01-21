<?php

namespace App\Http\Services;

use Auth;
use App\Traffic;
use Carbon\Carbon;

class TrafficService
{
	public static function traffic() {
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
}
