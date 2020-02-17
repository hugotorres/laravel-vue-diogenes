<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Profile;
use App\Category;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/welcome/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated( $request, $user)
            {
                $profile = Profile::where('user_id', '=', $user->id)->firstOrFail();
                $categories = Category::all();
             if ( $user->rol === 'bitch' ) {// do your magic here
                //return redirect('/profile/');
                return redirect()->route('user.profile', ['id' =>  $user->id]);

            }

            if ( $user->rol === 'admin' ) {// do your magic here

                dd($user);
               // return view('user.profile')->withUser($user)->withProfile($profile)->withCategories($categories);
            }

            }
}
