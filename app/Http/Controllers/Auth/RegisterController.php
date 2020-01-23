<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Role;
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
    protected $redirectTo = '/index';

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
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users|regex:^\w+@cuilahore.edu.pk$^',
            'password' => 'required|string|min:6|confirmed',
//              'day' => 'required',
//              'month' => 'required',
//              'year' => 'required',
//              'optradio' => 'required',
//              'city' => 'required',
//              'country' => 'required',
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


         $user=  User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'day' => $data['day'],
            'month' => $data['month'],
            'year' => $data['year'],
            'optradio' => $data['optradio'],
            'city' => $data['city'],
            'country' => $data['country'],
             'dept_id'=> $data['department'],
        ]);
        $role = Role::where('name', '=', 'student')->firstOrFail();
        $user->attachRole($role);
        return $user;
    }
}
