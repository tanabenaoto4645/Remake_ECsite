<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\category;
use Gloudemans\Shoppingcart\Contracts\Buyable;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model implements Buyable
{
    
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'name', 'detail', 'size', 'price', 'category_id'
    ];
    
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    
    public function order(){
        return $this->belongsTo('App\Order');
    }
    
    
    //buyable
    public function getBuyableIdentifier($options = null) {
        return $this->id;
    }
    public function getBuyableDescription($options = null) {
        return $this->name;
    }
    public function getBuyablePrice($options = null) {
        return $this->price;
    }
    public function getBuyableWeight($option = null) {
        return 1;
    }
    
    

}
