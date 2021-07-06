<?php

namespace App\Http\Controllers\Frontend;

use Cart;
use App\Models\Tree;
use App\Models\Cupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($cupon_name = "")
    {
        // echo $cupon_name;
        // echo Cupon::where('cupon_name', $cupon_name)->first();
        // dd(Cart::getSubTotal());
        $cupon_error = '';
        $discount_amount = '';
        if($cupon_name == ''){
            $cupon_name = '';
        } else{
            if(!Cupon::where('cupon_name', $cupon_name)->exists()){
                $cupon_error = 'Your Cupon is not right!';
                // return back()->with('bad_status', 'Your Cupon is not right!');
            } else{
                if(Cupon::where('cupon_name', $cupon_name)->first()->cupon_validity >= Carbon::now()->format('Y-m-d')){
                    // echo 'Your Cupon Date is Avialable';
                    if(Cupon::where('cupon_name', $cupon_name)->first()->purchase_amount <= Cart::getSubTotal()){
                        $discount_amount = Cupon::where('cupon_name', $cupon_name)->first()->discount_percentage;
                        // return back()->with('success_status', "Your Discount is $discount_amount");
                    } else{
                        $cupon_error = 'Your have not Discount!';
                        // return back()->with('bad_status', 'Your have not Discount!');
                    }
                } else{
                    $cupon_error = $cupon_name.' Cupon Date is Expired!';
                    // return back()->with('bad_status', 'Your Cupon Date is Expired!');
                }
            }
        }
        session()->forget('discount_amount');
        $cupons = Cupon::where('status', 'active')->orderBy('id', 'desc')->get();
        return view('frontend.layouts.cart.index', compact('cupons', 'discount_amount', 'cupon_error', 'cupon_name'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tree_id' => 'required'
        ]);

        $tree = Tree::findOrFail($request->tree_id);
        // dd($tree->id);
        $cart = Cart::add(array(
            'id' => $request->tree_id,
            'name' => $tree->tree_name,
            'price' => $tree->tree_price,
            'quantity' => 1,
        ));

        // $cartCollection = Cart::getContent();
        // dd($cartCollection->count());
        return back()->with('success_status', 'Cart Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|numeric|min:1'
        ]);

        Cart::update($id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity,
            ),
        ));
        return back()->with('success_status', 'Cart Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return back()->with('bad_status', 'Cart Deleted Successfully!');
    }
}
