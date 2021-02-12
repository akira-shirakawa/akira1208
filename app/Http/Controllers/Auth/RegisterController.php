<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request; 
use Auth; 

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
    protected $redirectTo = '/home';

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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {   $value = floor(rand(1,3));
        $path ='';
       if($value == 1){
           $path ='https://cdn2.aprico-media.com/production/imgs/images/000/008/522/original.jpg?1505870291';
       }elseif($value == 2){
           $path ='https://ascii.jp/img/2017/04/03/1613161/l/1f488c247261a472.jpg';
       }else{
           $path ='https://cdn2.aprico-media.com/production/imgs/images/000/008/522/original.jpg?1505870291';
       }
       
       
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'image' => $path,
            
            'password' => bcrypt($data['password']
           ),
        ]);
    }

}
