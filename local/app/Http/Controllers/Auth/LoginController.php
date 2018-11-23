<?php

namespace JackNersary\Http\Controllers\Auth;

use JackNersary\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use JackNersary\User;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }*/
	/* direct groupof users to their designated dashboard */
	public function login(Request $request){
	    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) 
		{
		  $user = User::where('email' , $request->email)->first();
		  
		  if($user->is_admin()=='admin'){
		     return redirect()->route('dashboard');
		  }
		  else if($user->is_admin()=='teacher'){
		     return redirect()->route('teacher');
		  }
		     return redirect()->route('home');
		  
		}
		\Session::flash('loginerror','Wrong username or password');
		return redirect()->back();
	}
}

