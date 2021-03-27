<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = "ordersproduct";
    public $primaryKey = 'orderpro_id';
    public function products()
    {
        return $this->hasOne('App\Product', 'pro_id', 'pro_id');
    }
    public function orders()
    {
        return $this->hasOne('App\Order', 'order_id', 'order_id');
    }
}
