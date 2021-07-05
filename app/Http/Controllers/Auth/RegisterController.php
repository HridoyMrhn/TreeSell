<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'user_name' => ['required', 'unique:users'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $file_name = '';
        if(request()->hasFile('image')){
            $file = request()->file('image');
            if($file->isValid()){
                $file_name = date('YmdHms').'.'.$file->getClientOriginalExtension();
                $file->storeAs('user', $file_name);
            }
        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'user_name' => Str::slug($data['user_name']),
            'phone_number' => $data['phone_number'],
            'address' => $data['address'],
            'about' => $data['about'] ?? null,
            'image' => $file_name
        ]);
        return back();
    }

    // public function create(Request $request){
    //     $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //         'user_name' => ['required', 'unique:users'],
    //     ]);

    //     $file_name = '';
    //     if(request()->hasFile('image')){
    //         $file = request()->file('image');
    //         if($file->isValid()){
    //             $file_name = date('YmdHms').'.'.$file->getClientOriginalExtension();
    //             $file->storeAs('user', $file_name);
    //         }
    //     }

    //     User::create($request->except('_token', 'image') + [
    //         'image' => $file_name
    //     ]);
    //     return back();
    // }
}
