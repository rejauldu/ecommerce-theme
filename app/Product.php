<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sku', 'name', 'description', 'supplier_id', 'category_id', 'quantity_per_unit', 'msrp', 'size_id', 'color_id', 'discount', 'weight', 'stock', 'unit_on_order', 'reorder_level', 'is_available', 'discount_available', 'picture', 'ranking', 'note', 'deleted_at', 'created_at', 'updated_at'
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
