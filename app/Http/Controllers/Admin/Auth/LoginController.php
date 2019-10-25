<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    use AuthenticatesUsers {
        sendFailedLoginResponse as protected failedLoginResponse;
    }

    public function login(Request $request)
    {
        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            return redirect(route('admin.home'));
        }

        return $this->sendFailedLoginResponse($request);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $this->failedLoginResponse($request);
    }

    public function showLoginForm()
    {
        $loginRoute = route('admin.login');
        $resetPasswordRoute = route('admin.password.request');
        return view('auth.login', compact('loginRoute', 'resetPasswordRoute'));
    }
}
