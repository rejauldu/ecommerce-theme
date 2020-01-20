<?php

namespace App\Locations;

use Illuminate\Database\Eloquent\Model;

class Upazila extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'bn_name', 'district_id', 'url', 'updated_at', 'created_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'bn_name', 'district_id', 'url', 'updated_at', 'created_at'
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
	public function district() {
		return $this->belongsTo('App\Locations\District');
	}
	public function unions() {
		return $this->hasMany('App\Locations\Union');
	}
}
