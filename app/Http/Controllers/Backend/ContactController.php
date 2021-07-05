<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('backend.layouts.contact.index', [
            'contacts' => Contact::paginate(10)
        ]);
    }


    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:20',
            'email' => 'required|email',
            'subject' => 'required',
            'number' => 'required',
            'message' => 'required',
        ]);

        Contact::create($request->except('_token'));
        session()->flash('status', 'We recived Your Message!');
        return back();
    }

    public function delete(Contact $id){
        $id->delete();
        session()->flash('status', 'Message has been Deleted!');
        return back();
    }
}
