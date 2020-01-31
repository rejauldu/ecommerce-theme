<?php

namespace App\Locations;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'bn_name', 'division_id', 'lat', 'lon', 'url', 'updated_at', 'created_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'bn_name', 'division_id', 'lat', 'lon', 'url', 'updated_at', 'created_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'updated_at' => 'datetime',
		'created_at' => 'datetime',
    ];
	public function division() {
		return $this->belongsTo('App\Locations\Division');
	}
	public function upazilas() {
		return $this->hasMany('App\Locations\Upazila');
	}
	public function regions() {
		return $this->hasMany('App\Locations\Region');
	}
}
