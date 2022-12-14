<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\category;



class Review extends Model
{
    //
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'title', 'body', 'like', 'product_id'
    ];
    
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

}
