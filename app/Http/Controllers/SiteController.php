<?php namespace App\Http\Controllers;

use DB;
use Input;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\database;


use Illuminate\Http\Request;

class SiteController extends Controller {

	public function index(){
		if (Session::get('role')=="admin"){
			return view('page-admin');
		}
		if (Session::get('role')=="teknisi"){
			return view('dashboard-teknisi');
		}
		return view('index');
	}
	public function teknisiPage(){
		return view('dashboard-teknisi');
	}
	public function historyPage(){
		return view('historyPage');
	}
	public function onprogressPage(){
		return view('onprogressPage');
	}
	public function requestKomponenPage(){
		return view('request-komponen');
	}
	public function requestKomponen(){
		$no_seri_barang_rusak = Input::get('no_seri_barang_rusak');
		$no_seri_komponen = Input::get('no_seri_komponen');
		$jumlah = Input::get('jumlah');
		$tanggal = Input::get('tanggal');
		//$no_tagihan = Input::get('no_tagihan');
		$i=0;
		if($no_seri_barang_rusak != "" && $no_seri_komponen != ""){
			while($i<$jumlah){
				DB::table('tagihan')->insert(array('no_seri_komponen'=>$no_seri_komponen,'no_seri_barang_rusak'=>$no_seri_barang_rusak,'tgl'=>$tanggal,'status'=>'requested'));
				$i++;
			}
		}
		return view('request-komponen');
	}
	public function adminPage(){
		return view('page-admin');
	}
	public function profilePage(){
		return view('page-profile');
	}
	public function adminprofilePage(){
		return view('page-adminprofile');
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
	public function adminprofileUpdate(){
		$oldPassword = Input::get('oldpwd');
		$newPassword = Input::get('newpwd');
		$newPasswordConfirmation = Input::get('newpwdconfirmation');
		
		echo $oldPassword." ".$newPassword." ".$newPasswordConfirmation;
		$user = DB::table('administrasi')->where('username',Session::get('username'))->first();
		echo $user->password;
		if($user->password != $oldPassword){
			echo "alert('Password Lama Salah');";
			return redirect('/adminprofile');
		}else{
			if($newPassword != $newPasswordConfirmation){
				echo "alert('Password Baru dan Konfirmasi Tidak Sama');";
				return redirect('/adminprofile');
			}else{
				$update = DB::update('update `administrasi` set `password` = ? where `username`=?',array($newPassword,Session::get('username')));
				echo "alert('Password berhasil diubah');";
				return redirect('/adminprofile');
			}
		}
	}
	public function request(){
		return view('page-request');
	}

	public function invoice(){

		$nama_perus="PT. ABC";
		$barang_rusak = database::getBarangSelesai($nama_perus);
		$i = 0;
		foreach($barang_rusak as $b){;
			$k = database::getComponentUsed($b->no_seri_barang_rusak);
			$komponens[$i] = $k;
			$nama_komponen = json_decode(json_encode($komponens[$i]), true);
			print_r($nama_komponen);

			echo "<br><br>";

			$i++;
		}

		$i = 0;
		foreach($komponens as $komponen){
			foreach ($komponen as $komp) {
				$nKomp[$i] = database::getNKomponen($komp->no_seri_barang_rusak, $komp->no_seri_komponen);
			}
			$i++;
		}

		echo "uigckg ".sizeof($nKomp);
		// echo "oinlhk ".$nKomp[2];
		// echo "asdaefvd ".sizeof($nKomp[2]);
		return view('invoice',compact('barang_rusak','komponens','k', 'nKomp'));
	}

}
