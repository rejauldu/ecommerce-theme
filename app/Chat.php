<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'message', 'file_name', 'type', 'sender_id', 'receiver_id', 'sent_at', 'viewed_at', 'deleted_by'
    ];
	
	protected $dates = ['sent_at', 'viewed_at', 'updated_at', 'created_at'];
	
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
	public function getDateAttribute($data) {
		return $date->format('d-m');
	}
	public function getTimeAttribute($data) {
		return $date->format('i:H');
	}
	public function sender() {
		return $this->belongsTo('App\User', 'sender_id', 'id');
	}
	public function receiver() {
		return $this->belongsTo('App\User', 'receiver_id', 'id');
	}
}
