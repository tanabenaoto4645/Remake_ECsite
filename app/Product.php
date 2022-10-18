<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\category;
use Illuminate\Support\Facades\Auth;
use \Cart;
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
    
    //並べ替え価格順
    public function getByOrder(int $condition)
    {
        //条件により並べ替え（1,2:更新順、3,4:新着順、5,6:価格順、7,8:人気順）
        switch($condition){
            case 1: return $this::with('category')->orderBy('updated_at', 'DESC')->paginate(10);
            case 2: return $this::with('category')->orderBy('updated_at', 'ASC')->paginate(10);
            case 3: return $this::with('category')->orderBy('created_at', 'DESC')->paginate(10);
            case 4: return $this::with('category')->orderBy('created_at', 'ASC')->paginate(10);
            case 5: return $this::with('category')->orderBy('price', 'DESC')->paginate(10);
            case 6: return $this::with('category')->orderBy('price', 'ASC')->paginate(10);
            // case 7: return $this::with('category')->orderBy('like', 'DESC')->paginate($limit_count);
            // case 8: return $this::with('category')->orderBy('like', 'DESC')->paginate($limit_count);
        }
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
    
    //いいね判定
    public function getLikedByUserAttribute()
    {
        if (Auth::guest()) {
            return false;
        }
        
        return Cart::instance('like')->content()->contains('id', $this->id);
    }

}
