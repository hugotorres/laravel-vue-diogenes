<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Profile;
use App\Category;
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
    protected $redirectTo = '/login?k=success';

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
            'bday' => ['required', 'string'],
            'gender' => ['required', 'string' ],
            'rol' => ['required', 'string' ],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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


        $today = date("Y-m-d");
        $diff = date_diff(date_create($data['bday']), date_create($today));
        $age=$diff->format('%y');


        if($age>=18){
                $user = User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'bday' => $data['bday'],
                    'gender' => $data['gender'],
                    'rol' => $data['rol'],
                    'status' => 1,
                    'password' => Hash::make($data['password']),
                ]);
                $profile = Profile::create([
                    'user_id' => $user['id'],
                    'text' => $user['name'],
                    'bday' => $user['bday'],
                    'gender' => $user['gender']
                ]);


                return $user;
        }
        else{
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'bday' => $data['bday'],
                'gender' => $data['gender'],
                'rol' => $data['rol'],
                'status' => 0,
                'password' => Hash::make($data['password']),
            ]);


            return $user;
        }
    }
}
