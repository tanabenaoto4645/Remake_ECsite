<?php

namespace App\Http\Controllers;
require '../vendor/autoload.php';
use \Cart;
use App\Product;
use App\Buyable;
use App\User;
use App\Order;
use App\Category;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Storage;


class UserController extends Controller
{
    //マイページ表示
    public function mypage(User $user)
    {
        return view('mypage')->with(['user' => $user]);
    }
    //ユーザー情報編集
    public function edit(User $user)
    {
        return view('editUser')->with(['user' => $user]);
    }
    //ユーザー情報更新
    public function update(Request $request, User $user)
    {
        $input = $request['user'];
        $user->fill($input)->save();

        return redirect('/user/'.$user->id);
    }
    
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
        if(!Cart::instance('like')->content()->contains('id', $product_id))
        {
            $product->likes++;
            $product->save();
            
            Cart::instance('like')->add($product, 1, ['image_path'=> $product->image_path_1]);
        }else{
            $product->likes++;
            $product->save();
            
            $itemId = Cart::instance('like')->content()->where('id', $product_id)->pluck('rowId');
            Cart::instance('like')->remove($itemId->first());
        }
        $likes = Cart::content();
        $user_id = Auth::user()->id;
        return redirect('user/like')->with(compact('likes','user_id'));
    }
    
    //お気に入り全削除
    public function resetLike() {
        foreach(Cart::instance('like')->content()->pluck('id') as $product_id)
        {
            $product = product::find($product_id);
            $product->likes--;
            $product->save();
        }
        Cart::instance('like')->destroy();
        return redirect('/user/like');
    }
    
    //お気に入り商品削除
    public function removeLike($rowId) {
        $product_id = Cart::instance('like')->get($rowId)->id;
        $product = product::find($product_id);
        Cart::instance('like')->remove($rowId);
        $product->likes--;
        $product->save();

        return redirect('/user/like');
    }
    
    public function orders($user) {
        $orders = Order::where('user_id','=', $user)->get();
        return view('orders')->with(['orders' => $orders]);
    }
    
    public function postReview($user) {
        $orders = Order::where('user_id','=', $user)->get();
        foreach($orders as $order){
            $products[] = Product::withTrashed()->find($order->product_id);
        }
        return view('postReview')->with(['products' => $products]);
    }
    
    //レビュー保存
    public function storeReview(Review $review, Request $request)
    {
        $input = $request['review'];
        $review->fill($input);
        $review->category_id = Product::withTrashed()->find($review->product_id)->category_id;
        $review->user_id = Auth::user()->id;

        //s3アップロード開始
        $images = $request->file('review');
        
        $disk = Storage::disk('s3');
        $i = 1;
        if(!is_null($images)){
        foreach ( $images as $image) {
            $path = $disk->putFile('reviews', $image, 'public');
            $review->{"image_path_"."$i"} = $disk->url($path);
            $i++;
        }
        }
        
        $review->save();
        
        return redirect('/review/');
    }
}


