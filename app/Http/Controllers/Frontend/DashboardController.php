<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){
        $user = User::where('id', Auth::id())->first();
        $trees = $user->trees()->paginate(1);
        return view('frontend.layouts.dashboard.dashboard', compact('user', 'trees'));
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
}
