<?php

namespace App\Http\Controllers;
require '../vendor/autoload.php';
use \Cart;
use App\Product;
use App\Buyable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //カート操作
    public function cart(){
        $carts = Cart::instance('shopping')->content();
        $user_id = Auth::user()->id;
        return view('user/cart')->with(compact('carts','user_id'));
    }
    
    public function addCart($product_id){
        $product = product::find($product_id);
        Cart::instance('shopping')->add($product, 1, ['image_path'=> $product->image_path_1]);
        
        $carts = Cart::content();
        $user_id = Auth::user()->id;
        return redirect('user/cart')->with(compact('carts','user_id'));
    }
    
    //カート内全削除
    public function resetCart() {
        Cart::instance('shopping')->destroy();
        return redirect('/user/cart');
    }
    
    //カート内商品削除
    public function removeCart($rowId) {
        Cart::instance('shopping')->remove($rowId);
        return redirect('/user/cart');
    }
    
    
    //お気に入り操作
    public function like(){
        $likes = Cart::instance('like')->content();
        $user_id = Auth::user()->id;
        return view('user/like')->with(compact('likes','user_id'));
    }
    
    public function addLike($product_id){
        $product = product::find($product_id);
        Cart::instance('like')->add($product, 1, ['image_path'=> $product->image_path]);
        
        $likes = Cart::content();
        $user_id = Auth::user()->id;
        return redirect('user/like')->with(compact('likes','user_id'));
    }
    
    //カート内全削除
    public function resetLike() {
        Cart::instance('like')->destroy();
        return redirect('/user/like');
    }
    
    //カート内商品削除
    public function removeLike($rowId) {
        Cart::instance('like')->remove($rowId);
        return redirect('/user/like');
    }
    
    
}


