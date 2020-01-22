<?php

namespace App\Http\Services;

use Auth;
use App\Product;
use Carbon\Carbon;

class ProductService
{
	public static function getProducts() {
		$products = Product::selectRaw('count(*) as total')
		->selectRaw('count(case when (stock-unit_on_order)<=0 then 1 end) as out_of_stock')
		->selectRaw('count(case when is_available=1 then 1 end) as available')
		->first();
		return $products;
	}
}
