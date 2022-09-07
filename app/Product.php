<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\category;



class Product extends Model
{
    
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
    
    

}
