<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Category extends Model
{
    //リレーション
    public function poducts()
    {
        return $this->hasMany('App\Products');  
    }
}
