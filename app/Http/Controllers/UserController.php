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
        $carts = Cart::content();
        $user_id = Auth::user()->id;
        return view('user/cart')->with(compact('carts','user_id'));
    }
    
    public function addCart($product_id){
        $product = product::find($product_id);
        Cart::add($product, 1, ['image_path'=> $product->image_path]);
        
        $carts = Cart::content();
        $user_id = Auth::user()->id;
        return redirect('user/cart')->with(compact('carts','user_id'));
    }
    
    //カート内全削除
    public function reset() {
        Cart::destroy();
        return redirect('/user/cart');
    }
    
    //カート内商品削除
    public function remove($rowId) {
        Cart::remove($rowId);
        return redirect('/user/cart');
    }
}


