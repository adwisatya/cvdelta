<?php namespace App\Http\Controllers;

use DB;
use Input;
use App\Quotation;
use Session;

class LoginController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

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
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('loginPage');
	}
	
	/**
	* Login has several role : dinas, UKM, industri
	* @redirect
	*/
	public function validateLogin()
	{

		$inputUsername = Input::get('username');
		$inputPassword = Input::get('password');
		
		$user = DB::table('teknisi')->where('username',$inputUsername)->first();		
		if($user->password == $inputPassword){
			Session::put('username', $inputUsername);
			if($user->role==1){
				Session::put('role', 'admin');
				return redirect('/admin');
			}else{
				Session::put('role', 'teknisi');
				return redirect('/teknisi');
			}
		}else{
			return redirect('/index');
		}
		
	}

	public function logout() 
	{
		Session::flush();
		return redirect('/index');
	}
}
