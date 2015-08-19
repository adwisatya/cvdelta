<?php namespace App\Http\Controllers;

use Input;
use App\Barang;
use App\database;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddBarangRequest;
use App\Http\Requests\FixBarangRusakRequest;

class BarangRusakController extends Controller {
	public function addBarang(AddBarangRequest $request){

		$nama_perusahaan = $request->nama_perusahaan;
		$nama_barang_rusak = $request->nama_barang_rusak;
		$no_seri_barang_rusak = $request->no_seri_barang_rusak;
		$no_seri_barang_rusak .= '|';
		$no_seri_barang_rusak .= date("ymd");
		$no_surat_jalan = $request->no_surat_jalan;
		$isRecheck = $request->isRecheck;
		if(!isset($isRecheck)){
			$isRecheck=0;
		}
		
		database::saveBarang($nama_barang_rusak, $nama_perusahaan, $no_seri_barang_rusak, $no_surat_jalan, $isRecheck);
		return redirect('/admin');
	}

	public function viewBarang(){
		$teknisi=database::getTeknisi();
		$barang_rusak=database::getBarangRusak();
		return view('barang-rusak', compact('barang_rusak','teknisi'));		
	}

	public function perbaiki(){
		$noseri=Input::get('noseri');
		$username=Input::get('nama_teknisi');
		$status="Onprogress";
		$tgl_diperbaiki=Carbon::now()->toDateString();

		database::perbaikiBarang($noseri, $username,$status,$tgl_diperbaiki);
		return redirect('/onprogress');
	}

	public function selesai(){
		$noseri=Input::get('idbarang');
		$status="Done";
		$tgl_selesai=Carbon::now()->toDateString();

		database::selesaiBarang($noseri,$tgl_selesai, $status);
		database::deleteRequest($noseri);
		
		return redirect('/onprogress');
	}

	public function unrepairable(){
		$noseri=Input::get('idbarang-unrepairable');
		$status="unrepairable";
		$tgl_selesai=Carbon::now()->toDateString();

		database::selesaiBarang($noseri,$tgl_selesai, $status);
		database::deleteRequest($noseri);
		
		return redirect('/onprogress');
	}

	public function changeStatusBarang() {
		$barangs = Input::get('no_seri_barang_rusak');
		// echo "lalala".$barangs;
		// echo "baraaang";
		// print_r($barangs);
		foreach ($barangs as $barang) {
			database::changeToBilled($barang);
		}

		echo "finish";
	}
}
