<?php

namespace App\Locations;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'bn_name', 'division_id', 'district_id', 'upazila_id', 'union_id', 'url', 'updated_at', 'created_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
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
	public function district() {
		return $this->belongsTo('App\Locations\District');
	}
	public function upazila() {
		return $this->belongsTo('App\Locations\Upazila');
	}
	public function union() {
		return $this->belongsTo('App\Locations\Union');
	}
}
