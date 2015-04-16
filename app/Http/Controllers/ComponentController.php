<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\database;
use Input;

use Illuminate\Http\Request;

class ComponentController extends Controller {
	public function request(){
		$datas = database::getRequestedComponent();
		return view('page-request')->with('datas', $datas);
	}

	public function stock(){
		$datas = database::getStock();
		return view('page-stock')->with('datas', $datas);
	}

	public function min(){
		$datas = database::getMinStock();
		return view('page-minstock')->with('datas', $datas);
	}

	public function add(){
		return view('page-addstock');
	}

	public function input(){
		$no = Input::get('no');
		$nama = Input::get('nama');
		$jumlah = Input::get('jumlah');
		$lokasi = Input::get('lokasi');
		$keterangan = Input::get('keterangan');
		$supplier = Input::get('supplier');
		$harga = Input::get('harga');

		for ($i=0; $i < sizeof($no); $i++) { 
			database::saveComponent($no[$i], $nama[$i], $jumlah[$i], $lokasi[$i], $keterangan[$i], $supplier[$i], $harga[$i]);
		}

		return redirect('/admin');
	}

	public function customer(){
		$customer=database::customer();
		return view('customer', compact('customer'));
	}

	public function addCustomer(){
		$nama = Input::get('nama_perusahaan');
		$alamat = Input::get('alamat');
		$telepon = Input::get('telepon');
		$cp = Input::get('contact_person');

		database::saveCustomer($nama,$alamat,$telepon,$cp);
		return redirect('/admin/customer');
	}

}
