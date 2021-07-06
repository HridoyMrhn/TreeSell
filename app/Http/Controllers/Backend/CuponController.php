<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Cupon;
use Illuminate\Http\Request;

class CuponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.layouts.cupon.index', [
            'cupons' => Cupon::orderBy('id', 'desc')->get()
        ]);
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
        // dd($request->all());
        if(request()->hasFile('cupon_image')){
            $file = request()->file('cupon_image');
            if($file->isValid()){
                $file_type = $file->getClientOriginalExtension();
                $file_name = date('Ymdhms').'.'.$file_type;
                $file->storeAs('cupon', $file_name);
            }
        }
        Cupon::create($request->except('_token', 'cupon_image') + [
            'cupon_image' => $file_name
        ]);
        return back()->with('success_status', 'Cupon Added Successfully');
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
    public function update(Request $request, Cupon $cupon)
    {
        $cupon->update($request->except('_token', 'cupon_image'));

        if(request()->hasFile('cupon_image')){
            $file = request()->file('cupon_image');
            if($file->isValid()){
                if(file_exists(public_path('uploads/cupon/'.$cupon->cupon_image))){
                    @unlink(public_path('uploads/cupon/'.$cupon->cupon_image));
                }
                $file_type = $file->getClientOriginalExtension();
                $file_name = date('Ymdhms').'.'.$file_type;
                $file->storeAs('cupon', $file_name);
                $cupon->update([
                    'cupon_image' => $file_name
                ]);
            }
        }
        return back()->with('success_status', 'Cupon has been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cupon $cupon)
    {
        if(file_exists(public_path('uploads/cupon/'.$cupon->cupon_image))){
            unlink(public_path('uploads/cupon/'.$cupon->cupon_image));
        }
        $cupon->delete();
        return back()->with('bad_status', 'Cupon Deleted');
    }
}
