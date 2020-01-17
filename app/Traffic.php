<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Traffic extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'ip', 'latitude', 'longitude', 'browser', 'browser_version', 'platform', 'device', 'visited_page', 'updated_at', 'created_at'
    ];
	
	protected $dates = ['updated_at', 'created_at'];
	
	public function getDateAttribute() {
		return $this->created_at->format('M Y');
	}
	public function getTimeAttribute() {
		return $this->updated_at->format('i:H');
	}
	public function user() {
		return $this->belongsTo('App\User');
	}
}