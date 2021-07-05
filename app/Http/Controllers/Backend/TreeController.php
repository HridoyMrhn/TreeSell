<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Tree;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MultipleImage;
use Illuminate\Support\Facades\Auth;

class TreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.layouts.tree.index', [
            'trees' => Tree::paginate(10),
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.layouts.tree.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tree_id = Tree::insertGetId($request->except('_token', 'tree_image') + [
            'user_id' => Auth::id(),
            'slug' => Str::slug($request->tree_name).'_'.Str::random(4),
            'created_at' => Carbon::now()
        ]);

        if(request()->hasFile('tree_image')){
            $seriel = 1;
            foreach($request->tree_image as $data){
                $file = $data;
                if($file->isValid()){
                    $file_name = $tree_id.'-'.$seriel++.'-'.time().'.'.$file->getClientOriginalExtension();
                    $file->storeAs('tree', $file_name);
                    MultipleImage::create([
                        'tree_id' => $tree_id,
                        'tree_image' => $file_name
                    ]);
                }
            }
        }
        session()->flash('success_status', 'Tree Has been Created!');
        return redirect()->route('tree.index');
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
        $tree = Tree::find($id);
        $tree->update($request->except('_token', 'tree_image'));

        if(!empty(request()->hasFile('tree_image'))){
            foreach($tree->multipleImage as $data){
                if(file_exists(public_path('uploads/tree/'.$data->tree_image))){
                    unlink(public_path('uploads/tree/'.$data->tree_image));
                }
            }
            MultipleImage::where('tree_id', $id)->delete();
        }

        if(request()->hasFile('tree_image')){
            $seriel = 1;
            foreach(request()->tree_image as $data){
                $file = $data;
                $file_name = $tree->id.'-'.$seriel++.'-'.time().'.'.$file->getClientOriginalExtension();
                $file->storeAs('tree', $file_name);
                MultipleImage::create([
                    'tree_id' => $tree->id,
                    'tree_image' => $file_name
                ]);
            }
        }
        session()->flash('success_status', 'Tree Has been Updated!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tree = Tree::find($id);
        foreach($tree->multipleImage as $data){
            if(file_exists(public_path('uploads/tree/'.$data->tree_image))){
                unlink(public_path('uploads/tree/'.$data->tree_image));
            }
            $data->delete();
        }
        $tree->delete();
        return back()->with('bad_status', 'Tree has been Deleted!');
    }


    public function approve($id){
        Tree::findOrFail($id)->update([
            'status' => 'approved'
        ]);
        return back()->with('success_status', 'Tree has been Approved!');
    }


    public function unapprove($id){
        Tree::findOrFail($id)->update([
            'status' => 'pending'
        ]);
        return back()->with('success_status', 'Tree has been Unapproved!');
    }
}
