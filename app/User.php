<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'photo', 'role_id', 'credit_card', 'payment_id', 'card_exp_month', 'card_exp_year', 'address', 'union_id', 'union_id', 'upazila_id', 'district_id', 'division_id', 'billing_address', 'billing_region_id', 'billing_union_id', 'billing_upazila_id', 'billing_district_id', 'billing_division_id', 'shipping_address', 'shipping_region_id', 'shipping_union_id', 'shipping_upazila_id', 'shipping_district_id', 'shipping_division_id', 'updated_at', 'created_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	
	protected $dates = ['updated_at', 'created_at'];
	
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
	
	public function getDateAttribute() {
		return $this->created_at->format('M Y');
	}
	public function getTimeAttribute() {
		return $this->updated_at->format('i:H');
	}
	public function role() {
		return $this->belongsTo('App\Role');
	}
	public function payment() {
		return $this->belongsTo('App\Payment');
	}
	public function division() {
		return $this->belongsTo('App\Locations\Division');
	}
	public function district() {
		return $this->belongsTo('App\Locations\District');
	}
	public function upazila() {
		return $this->belongsTo('App\Locations\Upazila');
	}
	public function union() {
		return $this->belongsTo('App\Locations\Union');
	}
	public function region() {
		return $this->belongsTo('App\Locations\Region');
	}
	public function billing_division() {
		return $this->belongsTo('App\Locations\Division', 'billing_division_id', 'id');
	}
	public function billing_district() {
		return $this->belongsTo('App\Locations\District', 'billing_district_id', 'id');
	}
	public function billing_upazila() {
		return $this->belongsTo('App\Locations\Upazila', 'billing_upazila_id', 'id');
	}
	public function billing_union() {
		return $this->belongsTo('App\Locations\Union', 'billing_union_id', 'id');
	}
	public function billing_region() {
		return $this->belongsTo('App\Locations\Region', 'billing_region_id', 'id');
	}
	public function shipping_division() {
		return $this->belongsTo('App\Locations\Division', 'shipping_division_id', 'id');
	}
	public function shipping_district() {
		return $this->belongsTo('App\Locations\District', 'shipping_district_id', 'id');
	}
	public function shipping_upazila() {
		return $this->belongsTo('App\Locations\Upazila', 'shipping_upazila_id', 'id');
	}
	public function shipping_union() {
		return $this->belongsTo('App\Locations\Union', 'shipping_union_id', 'id');
	}
	public function shipping_region() {
		return $this->belongsTo('App\Locations\Region', 'shipping_region_id', 'id');
	}
	public static function ifAdmin() {
		if(\Auth::user()->role->id != 3)
			return redirect()->back();
	}
	public static function ifAdminOrUserBy($id) {
		$user = \Auth::user();
		if($user->role->id != 3 && $user->id != $id)
			return redirect()->back();
	}
	public static function isUserBy($id) {
		return \Auth::user()->id == $id;
	}
}
