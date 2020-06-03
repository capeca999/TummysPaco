<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Badge;
use App\Award;
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
    static  function   LetraNIF ($dni) {
        return $letraNif= substr ("TRWAGMYFPDXBNJZSQVHLCKEO", $dni % 23, 1);
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
            'email' => ['required', 'email:rfc,dns','string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nif' => ['required', 'string', 'min:8', 'regex:/^[0-9]+$/',  'max:8', 'unique:users,nif'],
            'date_of_birth' =>['required', 'date'],
            'first_name' =>['nullable',  'string', 'min:2'],
            'last_name' =>['nullable',  'string', 'min:2'],
            'captcha' => 'required|captcha'
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
        return User::create([
            'name' => $data['name'],
            'nif' => $data['nif'] . self::LetraNIF($data['nif']),
            'email' => $data['email'],
            'password' => Hash::make($data['password']),           
            'date_of_birth' => $data['date_of_birth'],
            'role' => "Usuario",
            'first_name' =>$data['first_name'],
            'last_name' =>$data['last_name'],
        ]);

  
 


    }
}
