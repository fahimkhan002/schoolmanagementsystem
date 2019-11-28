<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Session\Session;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $username = 'username';
    protected $redirectTo = '/dashboard';
    protected $guard = 'web';

//    public function username()
//    {
//        return $this->username;
//    }

    public function getLogin(){
        if (Auth::guard('web')->check()) {

            return redirect()->route('dashboard');
        }
        return view('login');
    }

    public function postLogin(Request $request)
    {

        $auth = Auth::guard('web')->attempt(['username'=>$request->username,'password'=> $request->password,'active'=>1]);
//        dd($auth);
        if ($auth) {
            return redirect()->route('dashboard');
        }
        return redirect('/');
    }
    public function getLogout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
