<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_name', 'contact_name', 'address', 'division_id', 'district_id', 'upazila_id', 'union_id', 'region_id', 'phone', 'fax', 'email', 'website', 'payment_id', 'discount_type', 'discount', 'category_id', 'discount_available', 'user_id', 'logo', 'ranking', 'note'
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
}
