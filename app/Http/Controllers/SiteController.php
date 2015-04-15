<?php namespace App\Http\Controllers;

use DB;
use Input;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SiteController extends Controller {

	public function index(){
		return view('index');
	}
	public function teknisiPage(){
		return view('dashboard-teknisi');
	}
	public function historyPage(){
		return view('page-history');
	}
	public function requestKomponenPage(){
		return view('request-komponen');
	}
	public function adminPage(){
		return view('page-admin');
	}
	public function profilePage(){
		return view('page-profile');
	}
	public function profileUpdate(){
		$oldPassword = Input::get('oldpwd');
		$newPassword = Input::get('newpwd');
		$newPasswordConfirmation = Input::get('newpwdconfirmation');
		
		echo $oldPassword." ".$newPassword." ".$newPasswordConfirmation;
		$user = DB::table('teknisi')->where('username',Session::get('username'))->first();
		echo $user->password;
		if($user->password != $oldPassword){
			echo "alert('Password Lama Salah');";
			return redirect('/profile');
		}else{
			if($newPassword != $newPasswordConfirmation){
				echo "alert('Password Baru dan Konfirmasi Tidak Sama');";
				return redirect('/profile');
			}else{
				$update = DB::update('update `teknisi` set `password` = ? where `username`=?',array($newPassword,Session::get('username')));
				echo "alert('Password berhasil diubah');";
				return redirect('/profile');
			}
		}
	}
	public function request(){
		return view('page-request');
	}

	public function invoice(){
		return view('invoice');
	}
}
