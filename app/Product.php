<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'products';
	protected $fillable = [
        'name',
        'image',
        'description',
        'price',
        'category_id',
    
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function Orders()
    {
        return $this->belongsToMany('App\Order', 'details_order');
    }

    public function scopeName ($query, $name)
    {
        if (trim($name)) {
            return $query->where('name', 'LIKE', "%$name%");
        }
    }
   
}
