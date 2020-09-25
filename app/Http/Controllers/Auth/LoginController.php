<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\DesignDep;
use App\Models\Setting;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
    protected $redirectTo = "/dashboard";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:member')->except('logout');
    }

    protected function loggedOut() {
        return redirect('/');
    }

    protected function authenticated()
    {
        Auth::logoutOtherDevices(request('password'));
    }

    public function showMemberLoginForm()
    {
        $all_departments = DesignDep::where('parent', null)->get();

        $settings = Setting::first();

        $randomInteger1 = substr(mt_rand(), 0, 2);
        $randomInteger2 = substr(mt_rand(), 0, 2);

        $captchaQuestion = sprintf('%s + %s = ?', $randomInteger1, $randomInteger2);
        $captchaAnswer = $randomInteger1 + $randomInteger2;

        Session::put('captcha_answer', $captchaAnswer);

        return view('memberAuth.login', compact('settings', 'all_departments', 'captchaQuestion'));
    }

    public function memberLogin(Request $request)
    {
        $this->validate($request, [
            'member_email'   => 'required|email',
            'member_password' => 'required|min:6'
        ]);

        if (Auth::guard('member')->attempt(['email' => $request->member_email, 'password' => $request->member_password], $request->get('remember'))) {

            return redirect()->intended('/');
        }
      
            return redirect()->back()->withInput($request->only('email', 'remember'));
      
    }
}
