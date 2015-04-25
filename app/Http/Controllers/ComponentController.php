<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\database;
use Input;

use Illuminate\Http\Request;

class ComponentController extends Controller {
	public function request(){
		$datas = database::getRequestedComponent();
		$arr_datas = json_decode(json_encode($datas), true);
		foreach ($arr_datas as &$data) {
			$data['jumlah'] = database::getCountRequested($data['no_seri_komponen'], $data['no_seri_barang_rusak'], $data['username']);
			$data['min'] = database::getItemStock($data['no_seri_komponen'])[0]->jumlah;
			$data['min_stok'] = database::getItemStock($data['no_seri_komponen'])[0]->min_jumlah;
		}

		$datas = $arr_datas;

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

	public function addNewStock(){
		$nama_komponen = Input::get('nama_komponen');
		$no_seri_komponen = Input::get('no_seri_komponen');
		$supplier = Input::get('supplier');
		$harga = Input::get('harga');
		$jumlah = Input::get('jumlah');
		$lokasi = Input::get('lokasi');
		$keterangan = Input::get('keterangan');
		$min_jumlah = Input::get('min_jumlah');

		database::saveNewStock($nama_komponen, $no_seri_komponen, $supplier, $harga, $jumlah, $lokasi, $keterangan, $min_jumlah);
		return redirect('/admin/stock');
	}

	public function addStock(){
		$nama_komponen = Input::get('nama_komponen');
		$no_seri_komponen = Input::get('no_seri_komponen');
		$jumlah = Input::get('jumlah');

		database::saveStock($nama_komponen, $no_seri_komponen, $jumlah);
		return redirect('/admin/stock');
	}

	public function approval(){
		$no_seri_komponen = Input::get('noserikomponen');
		$no_seri_barang_rusak = Input::get('noseribarangrusak');
		$jumlah = Input::get('jumlahkomponen');
		$stok = Input::get('stokkomponen');
		$username = Input::get('username');
		$tombol = Input::get('tombol');

		database::approval($tombol, $no_seri_komponen, $no_seri_barang_rusak, $username);
		
		if ($tombol=="approved"){
			database::updateJumlahKomponen($no_seri_komponen,$stok-$jumlah);
		}

		return redirect('/admin/request');
	}

}
