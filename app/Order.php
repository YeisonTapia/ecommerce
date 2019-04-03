<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'orders';
	protected $fillable = [
        'user_id',
        'pay',   
    ];


    public function products()
    {
        return $this->belongsToMany('App\Product', 'details_order');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
