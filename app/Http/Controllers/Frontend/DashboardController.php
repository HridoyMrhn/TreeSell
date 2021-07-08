<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Tree;
use App\Models\User;
use App\Models\Order;
// use Barryvdh\DomPDF\PDF as PDF;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function dashboard(){
        return view('frontend.layouts.dashboard.dashboard', [
            'user' => User::where('id', Auth::id())->first()
        ]);
    }


    public function dashboardUpdate(Request $request, $id){
        $user = User::findOrFail($id);
        $user->update($request->except('_token', 'image'));

        $file_name = $user->image;
        if(request()->hasFile('image')){
            $file = request()->file('image');
            if($file->isValid()){
                if(file_exists(public_path('uploads/user/'.$user->image))){
                    unlink(public_path('uploads/user/'.$user->image));
                }
                $file_name = date('Ymdhms').'-'.$id.'.'.$file->getClientOriginalExtension();
                $file->storeAs('user', $file_name);
                $user->update([
                    'image' => $file_name
                ]);
            }
        }
        return back()->with('success_status', 'Profile has been Updated');
    }


    public function myTree(){
        // $trees = $user->trees()->paginate(1) ;
        return view('frontend.layouts.dashboard.my-trees', [
            'trees' => Tree::where('user_id', Auth::id())->paginate(10)
        ]);
    }


    public function myOrder(){
        // echo $orders = Order::where('user_id', Auth::id())->get();
        return view('frontend.layouts.dashboard.my-orders', [
            'orders' => Order::where('user_id', Auth::id())->get()
        ]);
    }


    public function orderShow($id){
        // dd(OrderDetails::where('order_id',$id));
        return view('frontend.layouts.dashboard.order-show', [
            'order_details' => Order::findOrFail($id)
        ]);
    }


    public function invoiceDownload($id){
        $order_details = Order::findOrFail($id);
        $pdf = PDF::loadView('frontend.layouts.dashboard.order-show', compact('order_details'));
        return $pdf->download('invoice.pdf');
    }


}
