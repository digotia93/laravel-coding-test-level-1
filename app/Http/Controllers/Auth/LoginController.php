<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller {
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
    protected $redirectTo = '/events';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest:web')->except('logout');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function login(Request $request) {
        // just simple sign in method without credentials
        $user = User::first();
        if (!$user) {
            $user = User::create([
                'id' => '1',
                'username' => 'Test',
                'password' => Hash::make('12345678'),
            ]);
        }

        Auth::login($user);
        return $this->sendLoginResponse($request);

        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
           

            return $this->sendLockoutResponse($request);
        }
     
        if ($this->attemptLogin($request)) {
           
            return $this->sendLoginResponse($request);
            
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }

    public function username()
    {
        return 'email';
    }

    public function logout(Request $request) {
        Auth::logout();
 
        // Redirect to homepage
        return redirect()->back();
        // $this->guard()->logout();

        // $request->session()->invalidate();

        // return redirect('/login');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard("web");
    }

}
