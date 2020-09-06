<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'specialist' => ['required', 'string'],
            'hospital' => ['required', 'string'],
            'detail' => ['required', 'string'],
            'image' => ['required', 'mimes:jpeg,jpg,png,PNG'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $request = request();
        $image = $request->file('image');

        //dd($image);

        if($image){
            $image_name = $image->getClientOriginalName();
            //$ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = uniqid().$image_name;
            $upload_path = 'public/frontend/image/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            $data['image'] = $image_url;

            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'specialist' => $data['specialist'],
                'hospital' => $data['hospital'],
                'detail' => $data['detail'],
                'password' => Hash::make($data['password']), 
                'image' => $data['image'],
            ]);
        } else{
            $notification = array(
                'message' => 'Image not valid',
                'alert-type' => 'danger'
            );
            return Redirect()->back()->with($notification);
        }
    }
}
