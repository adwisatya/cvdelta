<?php namespace App\Http\Controllers;

use DB;
use Input;
use Session;

use App\Barang;
use App\database;
use App\Currency;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CurrencyRequest;
use App\Http\Requests\AdminProfileRequest;
use App\Http\Requests\TeknisiProfileRequest;
use App\Http\Requests\InvoiceCustomerRequest;
use App\Http\Requests\TeknisiComponentRequest;

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
		if (Session::get('role')=="teknisi"){
			return view('request-komponen');
		}else{
			return view('index');
		}
	}
	public function historyPage(){
		if (Session::get('role')=="teknisi"){
			return view('historyPage');
		}else{
			return view('index');
		}		
	}
	public function onprogressPage(){
		if (Session::get('role')=="teknisi"){
			$barangrusak = database::getBarangRusak();
			$teknisi = database::getTeknisi();
			return view('onprogressPage', compact('barangrusak','teknisi'));
		}else{
			return view('index');
		}
	}
	public function findKomponenView(){
		return view('find-komponen');
	}

	public function requestKomponenPage(){
		if (Session::get('role')=="teknisi"){
			$komponen = Input::get('findComp');
			$komponen_hasil = database::getKomponenLike($komponen);
			$barang_progress=database::getBarangOnProgress();
			return view('request-komponen', compact('barang_progress','komponen_hasil'));
		}else{
			return view('index');
		}
	}
	public function requestKomponen(TeknisiComponentRequest $request){
		$no_seri_barang_rusak = $request->noBarangRusak;
		$no_seri_komponen = $request->noKomponen;
		$jumlah = $request->jumlah;
		$tanggal = Input::get('tanggal');
		$i=0;
		if($no_seri_barang_rusak != "" && $no_seri_komponen != ""){
			while($i<$jumlah){
				DB::table('tagihan')->insert(array('no_seri_komponen'=>$no_seri_komponen,'no_seri_barang_rusak'=>$no_seri_barang_rusak,'tgl'=>$tanggal,'status'=>'requested'));
				$i++;
			}
		}
		return view('find-komponen');
	}

	public function adminPage(){
		if (Session::get('role')=="admin"){
			$customer = database::customer();
			return view('admin-index', compact('customer'));
		}else{
			return view('index');
		}
	}
	public function profilePage(){
		if (Session::get('role')=="teknisi"){
			return view('page-profile');
		}else{
			return view('index');
		}
	}
	public function adminprofilePage(){
		if (Session::get('role')=="admin"){
			return view('page-adminprofile');
		}else{
			return view('index');
		}

	}
	public function profileUpdate(TeknisiProfileRequest $request){
		$oldPassword = $request->oldpwd;
		$newPassword = $request->newpwd;
		$newPasswordConfirmation = $request->newpwdconfirmation;
		
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
	public function adminprofileUpdate(AdminProfileRequest $request){
		$oldPassword = $request->oldpwd;
		$newPassword = $request->newpwd;
		$newPasswordConfirmation = $request->newpwdconfirmation;
		
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
		if (Session::get('role')=="admin"){
			return view('page-request');
		}else{
			return view('index');
		}
	}

	public function invoice(){

		$nama_perus=Input::get('nama_perusahaan');
		$barang_rusak = database::getBarangSelesai($nama_perus);

		$i = 0;
		foreach($barang_rusak as $b){;
			$k = database::getComponentUsed($b->no_seri_barang_rusak);
			$komponens[$i] = $k;
			$i++;
		}

		$nama_komponen = json_decode(json_encode($komponens), true);

		foreach ($nama_komponen as &$komponen) {
			foreach ($komponen as &$komp) {
				$komp['jumlah'] = database::getNKomponen($komp['no_seri_barang_rusak'], $komp['no_seri_komponen']);
				$komp['harga'] = database::getPrice($komp['no_seri_komponen']);
				$komp['subtotal'] = $komp['jumlah']*$komp['harga'][0]->harga;
			}
		}

		$komponens = $nama_komponen;

		print_r($komponens);
		
		return view('invoice',compact('barang_rusak','komponens','nama_perus'));
	}

	public function chooseCustomer(){
		$customer=database::customer();
		return view('pilih-customer',compact('customer'));
	}

	public function user(){
		$admin=database::getAdmin();
		$teknisi=database::getTeknisi();
		return view('user', compact('admin','teknisi'));
	}
	public function deleteCustomer($id){
		database::deleteCustomer($id);
		$customer = database::customer();
		return view('customer',compact('customer'));
	}

	public function toIDR($value) {
		$val = substr($value, 0, -4);
		$curr = substr($value, -3);

		switch ($curr) {
			case "USD":
				$res = $val*(Currency::find(1)->IDR);
				break;
			case "CNY":
				$res = $val*(Currency::find(2)->IDR);
				break;
			case "SGD":
				$res = $val*(Currency::find(3)->IDR);
				break;
			default:
				$res = 1;
		}
		return $res;
	}

	public function showInvoice(InvoiceCustomerRequest $request){
		// $nama_perus=$request->nama_perusahaan;
		// $bulan = Input::get('bulan');
		// $barang_rusak = database::getBarangSelesaionMonth($nama_perus,$bulan);

		// $i = 0;
		// foreach($barang_rusak as $b){;
		// 	$k = database::getComponentUsed($b->no_seri_barang_rusak);
		// 	$komponens[$i] = $k;
		// 	$i++;
		// }
		// if(!isset($komponens)){
		// 	$error = "Tidak ada tagihan yang dapat dibuat";
		// 	$customer = database::customer();
		// 	return view ('pilih-customer',compact('error','customer'));
		// }else{
		// 	$nama_komponen = json_decode(json_encode($komponens), true);

		// 	foreach ($nama_komponen as &$komponen) {
		// 		foreach ($komponen as &$komp) {
		// 			$komp['jumlah'] = database::getNKomponen($komp['no_seri_barang_rusak'], $komp['no_seri_komponen']);
		// 			$komp['harga'] = database::getPrice($komp['no_seri_komponen']);
		// 			$komp['subtotal'] = $komp['jumlah']*$komp['harga'][0]->harga;
		// 		}
		// 	}

		// 	$komponens = $nama_komponen;
			
		// 	return view('invoice-edit',compact('barang_rusak','komponens','nama_perus'));

		$nama_perus = Input::get('namaPerus');
		// $bulan = Input::get('bulan');
		// $barang_rusak = database::getBarangSelesaionMonth($nama_perus,$bulan);
		$barang_rusak = database::getUnbilledBarangSelesai($nama_perus);

		$i = 0;
		foreach($barang_rusak as $b){;
			$k = database::getComponentUsed($b->no_seri_barang_rusak);
			$komponens[$i] = $k;
			$i++;
		}
		if(!isset($barang_rusak)){
			$error = "Tidak ada tagihan yang dapat dibuat";
			$customer = database::customer();
			return view ('pilih-customer',compact('error','customer'));
		}else{
			if(!isset($komponens)){
				$error = "no komponen";
				$customer = database::customer();
				return view ('pilih-customer',compact('error','customer'));
			}else{
				$nama_komponen = json_decode(json_encode($komponens), true);
			}
			foreach ($nama_komponen as &$komponen) {
				foreach ($komponen as &$komp) {
					$komp['jumlah'] = database::getNKomponen($komp['no_seri_barang_rusak'], $komp['no_seri_komponen']);
					$arr = database::getPrice($komp['no_seri_komponen']);
					$komp['harga'] = $this->toIDR(json_decode(json_encode($arr), true)[0]["harga"]);
					$komp['subtotal'] = $komp['jumlah']*$komp['harga'];
				}

				$komponens = $nama_komponen;
				
				return view('invoice-edit',compact('barang_rusak','komponens','nama_perus'));
			}
		}
	}
	public function showInvoicePerusahaan(){
		$nama_perus = Input::get('namaPerus');
		$barang_rusak = database::getUnbilledBarangSelesai($nama_perus);
		
		$i = 0;
		foreach($barang_rusak as $b){
			$k = database::getComponentUsed($b->no_seri_barang_rusak);
			$komponens[$i] = $k;
			$i++;
		}
		if(!isset($barang_rusak)){
			$error = "Tidak ada tagihan yang dapat dibuat";
			$customer = database::customer();
			return view ('pilih-customer',compact('error','customer'));
		}else{
			if(!isset($komponens)){
				$error = "no komponen";
				$customer = database::customer();
				return view ('invoice',compact('barang_rusak','komponens','nama_perus'));
			}else{
				$nama_komponen = json_decode(json_encode($komponens), true);
			}
		
				foreach ($nama_komponen as &$komponen) {
					foreach ($komponen as &$komp) {
						$komp['jumlah'] = database::getNKomponen($komp['no_seri_barang_rusak'], $komp['no_seri_komponen']);
						$arr = database::getPrice($komp['no_seri_komponen']);
						$komp['harga'] = $this->toIDR(json_decode(json_encode($arr), true)[0]["harga"]);
						$komp['subtotal'] = $komp['jumlah']*$komp['harga'];
					}
				}

				$komponens = $nama_komponen;
				
				return view('invoice',compact('barang_rusak','komponens','nama_perus'));
			}
		
	}
	// public function showInvoicePDF(InvoiceCustomerRequest $request){
	// 	$nama_perus=$request->nama_perusahaan;
	// 	$barang_rusak = database::getUnbilledBarangSelesai($nama_perus);

	// 	$i = 0;
	// 	foreach($barang_rusak as $b){;
	// 		$k = database::getComponentUsed($b->no_seri_barang_rusak);
	// 		$komponens[$i] = $k;
	// 		$i++;
	// 	}
	// 	if(!isset($barang_rusak)){
	// 		$error = "Tidak ada tagihan yang dapat dibuat";
	// 		$customer = database::customer();
	// 		return view ('pilih-customer',compact('error','customer'));
	// 	}else{
	// 		if(!isset($komponens)){
	// 			$error = "no komponen";
	// 			$customer = database::customer();
	// 			return view ('pilih-customer',compact('error','customer'));
	// 		}else{
	// 			$nama_komponen = json_decode(json_encode($komponens), true);

	// 			foreach ($nama_komponen as &$komponen) {
	// 				foreach ($komponen as &$komp) {
	// 					$komp['jumlah'] = database::getNKomponen($komp['no_seri_barang_rusak'], $komp['no_seri_komponen']);
	// 					$komp['harga'] = database::getPrice($komp['no_seri_komponen']);
	// 					$komp['subtotal'] = $komp['jumlah']*$komp['harga'][0]->harga;
	// 				}
	// 			}

	// 			$komponens = $nama_komponen;
				
	// 			// return view('invoice-edit',compact('barang_rusak','komponens','nama_perus'));
	// 			$pdf = \PDF::loadView('invoice-pdf',compact('barang_rusak','komponens','nama_perus'));
	// 			return $pdf->stream();
	// 		}
	// 	}
	// }
	public function perusahaanUnbilled(){
		$perusahaan = database::getPerusahaanUnbilledTagihan();
		return view('perusahaan-unbilled',compact('perusahaan'));
	}

	public function showCurrency() {
		$currencies = Currency::all();
		return view ('currency')->with('currency', $currencies);
	}

	public function changeCurrency(CurrencyRequest $request) {
		$curr = Currency::find(1);
		$curr->IDR  = $request->usd;
		$curr->save();

		$curr = Currency::find(2);
		$curr->IDR  = $request->cny;
		$curr->save();

		$curr = Currency::find(3);
		$curr->IDR  = $request->sgd;
		$curr->save();

		return redirect('/admin');
	}
}
