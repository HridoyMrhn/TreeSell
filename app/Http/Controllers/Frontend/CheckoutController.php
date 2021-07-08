<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderDetails;
use App\Models\Tree;
use Carbon\Carbon;
// use Darryldecode\Cart\Cart as Cart;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){
        return view('frontend.layouts.cart.checkout');
    }


    public function store(Request $request){
        $request->validate([
            'shipping_address' => 'required',
            'payment_gatway_name' => 'required',
            'transaction_id' => 'required|numeric',
        ]);

        $order = Order::insertGetId([
            'user_id' => Auth::id(),
            'shipping_address' => $request->shipping_address,
            'cupon_name' => session('cupon_name'),
            'payment_gatway_name' => $request->payment_gatway_name,
            'transaction_id' => $request->transaction_id,
            'discount_amount' => session('discount_amount'),
            'subtotal' => Cart::getTotal(),
            'total' => Cart::getTotal() - session('discount_amount'),
            'created_at' => Carbon::now()
        ]);

        foreach(Cart::getContent() as $cart){
            OrderDetails::create([
                'order_id' => $order,
                'product_id' => $cart->id,
                'product_price' => Tree::find($cart->id)->tree_price,
                'product_quantity' => $cart->quantity,
            ]);
        }
        Cart::clear();
        session()->flash('success_status', 'Order has been stored Successfully!');
        return redirect()->route('index');
    }
}
