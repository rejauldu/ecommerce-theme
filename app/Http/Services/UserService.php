<?php

namespace App\Http\Services;

use Auth;
use App\User;
use Carbon\Carbon;

class UserService
{
	public static function getTotal() {
		$total = User::all()->count();
		return $total;
	}
}
