<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    public $primaryKey = 'cat_id';
    public $timestamps = true;

    public function products()
    {
        return $this->hasMany('App\Product', 'cat_id', 'cat_id');
    }
}
