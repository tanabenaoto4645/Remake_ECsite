<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Category extends Model
{
    //リレーション
    public function products()
    {
        return $this->hasMany('App\Product');  
    }
    
    //カテゴリー別に取得
    public function getByCategory(int $limit_count=5)
    {
        return $this->products()->with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
