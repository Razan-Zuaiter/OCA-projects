<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    public $primaryKey = 'pro_id';
    public $timestamps = true;

    public function category()
    {
        return $this->belongsTo('App\Category', 'cat_id');
    }
    public function orders()
    {
        return $this->belongsToMany('App\Order', 'order_id');
    }
    public function orderProducts()
    {
        return $this->belongsTo('App\OrderProduct', 'orderpro_id');
    }
}
