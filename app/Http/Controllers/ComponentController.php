<?php namespace App\Http\Controllers;

use Input;
use App\database;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddStockRequest;
use App\Http\Requests\AddCountRequest;
use App\Http\Requests\AddCustomerRequest;
use App\Http\Requests\UpdateStockRequest;

class ComponentController extends Controller {
	public function request(){
		$datas = database::getRequestedComponent();
		$arr_datas = json_decode(json_encode($datas), true);
		foreach ($arr_datas as &$data) {
			$data['jumlah'] = database::getCountRequested($data['no_seri_komponen'], $data['no_seri_barang_rusak'], $data['username']);
			$data['min'] = database::getItemStock($data['no_seri_komponen'])[0]->jumlah;
			$data['min_stok'] = database::getItemStock($data['no_seri_komponen'])[0]->min_jumlah;
			// $data['supplier'] = database::getSuppliersByNoSeriKomp($no_seri_komp);
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

	public function addBarangRusak(){
		$customer=database::customer();
		return view('add-barang-rusak', compact('customer'));
	}

	public function customer(){
		$customer=database::customer();
		return view('customer', compact('customer'));
	}

	public function addCustomer(AddCustomerRequest $request){
		$nama = $request->nama_perusahaan;
		$alamat = $request->alamat;
		$telepon = $request->telepon;
		$cp = $request->contact_person;
		echo $cp;

		database::saveCustomer($nama,$alamat,$telepon,$cp);
		return redirect('/admin/customer');
	}

	public function addNewStock(AddStockRequest $request){
		$nama_komponen = $request->nama_komponen;
		$no_seri_komponen = $request->no_seri_komponen;
		$supplier = $request->supplier;
		$harga = $request->harga;
		$curr = $request->currency;
		$jumlah = $request->jumlah;
		$lokasi = $request->lokasi;
		$keterangan = $request->keterangan;
		$min_jumlah = $request->min_jumlah;

		database::saveNewStock($nama_komponen, $no_seri_komponen, $supplier, $harga.'-'.$curr, $jumlah, $lokasi, $keterangan, $min_jumlah);
		return redirect('/admin/stock');
	}

	public function addStock(AddCountRequest $request){
		$no_seri_komponen = Input::get('noSeri');
		$jumlah = $request->jumlah;

		database::saveStock($no_seri_komponen, $jumlah);
		return redirect('/admin/stock');
	}

	public function approval(){
		$no_seri_komponen = Input::get('noserikomponen');
		$no_seri_barang_rusak = Input::get('noseribarangrusak');
		$jumlah = Input::get('jumlahkomponen');
		$stok = Input::get('stokkomponen');  //ambil stok dari id nya. 
		$username = Input::get('username');
		$tombol = Input::get('tombol');
		$supplier = Input::get('supplier');
		$komponens = database::getIDKomponenBySupplier($no_seri_komponen,$supplier);
		echo 'masuk yg ats';
		echo $supplier;
		foreach ($komponens as $komponen) {
			database::approval($tombol, $no_seri_komponen, $no_seri_barang_rusak, $username, $supplier, $komponen->id);
			$componentUsedStock = database::getKomponenById($komponen->id);
			if ($tombol=="approved"){
				foreach($componentUsedStock as $k_stock){
					database::updateJumlahKomponen($komponen->id,$k_stock->jumlah-$jumlah);					
				}
			} else{
				// echo $refused->tagihan.id;
				database::delDeclined();

			}
		}
		return redirect('/admin/request');
	}

// <<<<<<< HEAD
	public function tambahStokView($id){
		$komponen = database::getKomponenByNoSeri($id);
		return view('tambah-stok', compact('komponen'));
	}

	public function updateStockView($id){
		$ids = $id;
		$komponen = database::getKomponenByNoSeri($id);
		// return view('debug',compact('komponen'));
		return view('update-stock',compact('komponen'));
	}

	public function updateStock(UpdateStockRequest $request){
		$noSeri = $request->noSeri;
		$namaKomponen = $request->namaKomponen;
		$lokasi = $request->lokasi;
		$supplier = $request->supplier;
		$harga = $request->harga;
		$minJum = $request->minJum;
		$jumlah = $request->jumlah;
		$ket = $request->ket;

		database::updateStock($noSeri, $namaKomponen, $lokasi, $supplier, $harga, $minJum, $ket);
		return redirect('admin/stock');
	}

	public function checkRequest() {
		$datas = database::getUnnotifiedRequestedComponent();
		if (isset($datas)){
			echo json_encode($datas);
			database::changeUnnotifiedStatus();
		} else{
			echo 0;
		}
	}

	public function countRequest() {
		$datas = database::getRequestedComponent();
		if (isset($datas)) {
			echo count((array) $datas);
		} else {
			echo 0;
		}
	}

	public function cari() {
		$datas = database::findItem(Input::get('get_komponen'));
		return view('page-stock')->with('datas', $datas);
	}

	public function findfewstock() {
		$datas = database::findMinItem(Input::get('get_komponen'));
		return view('page-minstock')->with('datas', $datas);
	}
}
