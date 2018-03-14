<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Override the username method used to validate login
     *
     * @return string
     */
    public function username()
    {
        return 'username';
    }

            /**
         * Get the needed authorization credentials from the request.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return array
         */
        protected function credentials(Request $request)
        {
            return [
                'username' => $request->{$this->username()},
                'password' => $request->password,
                'status' => '1',
            ];
        }

        protected function hasTooManyLoginAttempts(Request $request)
        {
            $maxLoginAttempts = 3;
         
            $lockoutTime = 1; // In minutes
         
            return $this->limiter()->tooManyAttempts(
                $this->throttleKey($request), $maxLoginAttempts, $lockoutTime
            );
        }
}
