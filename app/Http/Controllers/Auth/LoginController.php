<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
    
     protected $redirectTo = '/home'; // デフォルトのリダイレクト先

     // 他のメソッド...
 
     // ログイン後のリダイレクト先を設定
    //  protected function authenticated(Request $request, $user)
    // {
    //     return redirect()->route('/home'); // ログイン完了画面にリダイレクト
    // }
}
