<?php

namespace App\Http\Controllers;
require '../vendor/autoload.php';


use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\Product;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use \Cart;



class PaymentController extends Controller
{
    //
    public function payment(Request $request)
    {
        try
        {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $customer = Customer::create(array(
                'email' => $request->stripeEmail,
                'source' => $request->stripeToken
            ));

            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount' => $request->amount,
                'currency' => 'jpy'
            ));
            
            $dt = new Carbon();

            $i = 0;
            foreach($request->id as $val){
            $order = new Order;
            $order->user_id = Auth::user()->id;
            $order->product_id = $request->id[$i];
            $order->status = '1';
            $order->sales_date = $dt->format('Y-m-d');
            $order->sales_info = $request->row_id[$i];
            // $order->userInfo_id = Auth::user()->id;
            $order->save();
            $product = Product::find($order->product_id);
            $product->delete();
            $i++;
            }
        
            Cart::instance('shopping')->destroy();
            
            Mail::send(new PaymentCompleteMail($request->stripeName, $request->stripeEmail));

            return redirect()->route('complete');
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function complete()
    {
        
        return view('user/complete');
    }
}
