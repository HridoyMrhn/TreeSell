<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(){
        return view('backend.layouts.order.index', [
            'order' => Order::all()
        ]);
    }


    public function show($id){
        // dd($id);
        return view('backend.layouts.order.show', [
            'order_details' => Order::findOrFail($id)
        ]);
    }


    public function destory($id){
        $Order = Order::findOrFail($id);
        $Order->orderDetails()->delete();
        $Order->delete();
        return back()->with('bad_status', 'Order has been Deleted!');
    }
}
