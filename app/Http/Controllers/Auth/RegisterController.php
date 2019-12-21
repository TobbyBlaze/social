<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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
            'name' => ['required', 'string', 'max:20', 'min:2'],
            // 'title' => ['string', 'max:4'],
            // 'first_name' => ['required', 'string', 'max:20', 'min:2'],
            // 'last_name' => ['required', 'string', 'max:20', 'min:2'],
            // 'status' => ['string', 'max:20'],
            'reg_no' => ['required', 'string', 'max:14', 'max:14', 'unique:users'],
            // 'bio' => ['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:40', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            // 'phone_number_1' => ['required', 'string', 'max:20'],
            // 'phone_number_2' => ['string', 'max:20'],
            // 'date_of_birth' => ['date', 'max:10', 'max:10'],
            // 'department' => ['string', 'max:100'],
            // 'school' => ['string', 'max:100'],
            // 'college' => ['string', 'max:100'],
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
            'id' => $data['id'],
            'name' => $data['name'],
            // 'title' => $data['title'],
            // 'first_name' => $data['first_name'],
            // 'last_name' => $data['last_name'],
            // 'status' => $data['status'],
            'reg_no' => $data['reg_no'],
            // 'bio' => $data['bio'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone_number_1' => $data['phone_number_1'],
            // 'phone_number_2' => $data['phone_number_2'],
            // 'date_of_birth' => $data['date_of_birth'],
            // 'department' => $data['department'],
            // 'school' => $data['school'],
            // 'college' => $data['college'],
        ]);
    }
}
