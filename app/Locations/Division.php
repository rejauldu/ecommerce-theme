<?php

namespace App\Locations;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'bn_name', 'url', 'updated_at', 'created_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'bn_name', 'url', 'updated_at', 'created_at'
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
	public function districts() {
		return $this->hasMany('App\Locations\District');
	}
	public function regions() {
		return $this->hasMany('App\Locations\Region');
	}
}
