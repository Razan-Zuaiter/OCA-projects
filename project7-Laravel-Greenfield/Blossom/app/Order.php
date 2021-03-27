<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";
    public $primaryKey = 'order_id';
    public $timestamps = true;

    public function products()
    {
        return $this->hasMany('App\Product', 'pro_id', 'pro_id');
    }
    public function users()
    {
        return $this->belongsToMany('App\User', 'user_id', 'id');
    }
    public function orderProducts()
    {
        return $this->belongsTo('App\OrderProduct', 'orderpro_id');
    }
}
