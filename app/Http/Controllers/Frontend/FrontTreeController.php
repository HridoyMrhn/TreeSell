<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Tree;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MultipleImage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class FrontTreeController extends Controller
{
    public function upload(){
        if(Auth::check()){
            return view('frontend.layouts.tree.upload', [
                'categories' => Category::all()
            ]);
        } else{
            session(['redirect_route' => 'user.tree.upload']);
            return redirect()->route('login')->with('bad_status', 'You are not Authentic User!');
        }
    }


    public function store(Request $request){
        $tree_id = Tree::insertGetId($request->except('_token', 'tree_image') + [
            'user_id' => Auth::id(),
            'slug' => Str::slug($request->tree_name).'_'.Str::random(4),
            'created_at' => Carbon::now()
        ]);

        if($request->hasFile('tree_image')){
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
        return redirect()->route('user.dashboard');
    }


    public function treeShow($slug){
        $tree_details = Tree::where('slug', $slug)->first();
        $tree_details->increment('most_view');
        return view('frontend.layouts.tree.details', compact('tree_details'));
    }


    public function treeUpdate(Request $request, $id){
        $tree = Tree::findOrFail($id);
        $tree->update($request->except('_token', 'tree_image'));

        if(!empty($request->hasFile('tree_image'))){
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
                if($file->isValid()){
                    $file_name = $id.'-'.$seriel++.'-'.time().'.'.$file->getClientOriginalExtension();
                    $file->storeAs('tree', $file_name);
                    MultipleImage::create([
                        'tree_id' => $id,
                        'tree_image' => $file_name
                    ]);
                }
            }
        }
        session()->flash('success_status', 'Tree Has been Updated!');
        return back();
    }


    public function treeDelete($slug){
        $tree = Tree::where('slug', $slug)->first();
        foreach($tree->multipleImage as $data){
            // echo $data->tree_image.'<br>';
            if(file_exists(public_path('uploads/tree/'.$data->tree_image))){
                unlink(public_path('uploads/tree/'.$data->tree_image));
            }
            $data->delete();
        }
        $tree->delete();
        return back()->with('bad_status', 'Tree has been Deleted!');
    }


    public function treeRecent(){
        return view('frontend.layouts.pages.recent', [
            'trees' => Tree::where('status', 'approved')->paginate(10)
        ]);
    }


    public function treeSearch(Request $request){
        // dd($request->all());
        $search = $request->name;
        $location = $request->location;
        $searched = false;

        if(empty($search) && empty($location)){
            return back()->with('bad_status', 'Maybe you serch empty data!');;
        } elseif(empty($search) && !empty($location)){
            $trees = Tree::where('status', 'approved')
                ->where('tree_location', 'like', '%'.$location.'%')
                ->paginate(10);
            $searched = true;
        } elseif(!empty($search) && empty($location)){
            $trees = Tree::where('status', 'approved')
                ->where('tree_name', 'like', '%'.$search.'%')
                ->orWhere('tree_scientific_name', 'like', '%'.$search.'%')
                ->orWhere('tree_width', 'like', '%'.$search.'%')
                ->orWhere('tree_height', 'like', '%'.$search.'%')
                ->paginate(10);
            $searched = true;
        } else{
            $trees = Tree::where('status', 'approved')
                ->where('tree_name', 'like', '%'.$search.'%')
                ->orWhere('tree_scientific_name', 'like', '%'.$search.'%')
                ->orWhere('tree_width', 'like', '%'.$search.'%')
                ->orWhere('tree_height', 'like', '%'.$search.'%')
                ->orWhere('tree_location', 'like', '%'.$location.'%')
                ->paginate(10);
        }

        if($searched){
            foreach($trees as $data){
                $data->increment('total_search');
            }
        }
        return view('frontend.layouts.pages.recent', compact('trees', 'search', 'location'));
    }


    public function mostSearch(){
        return view('frontend.layouts.pages.recent', [
            'trees' => Tree::orderBy('total_search', 'desc')->paginate(10)
        ]);
    }


    public function mostView(){
        return view('frontend.layouts.pages.recent', [
            'trees' => Tree::orderBy('most_view', 'desc')->paginate(10)
        ]);
    }
}
