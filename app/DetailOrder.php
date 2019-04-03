<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailOrder extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'details_order';
	protected $fillable = [
        'order_id',
        'product_id',
        'quantity'
    ];
}
