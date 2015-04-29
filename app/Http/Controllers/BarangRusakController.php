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
		$no_surat_jalan = $request->no_surat_jalan;
		
		database::saveBarang($nama_barang_rusak, $nama_perusahaan, $no_seri_barang_rusak, $no_surat_jalan);
		return redirect('/admin');
	}

	public function viewBarang(){
		$teknisi=database::getTeknisi();
		$barang_rusak=database::getBarangRusak();
		return view('barang-rusak', compact('barang_rusak','teknisi'));		
	}

	public function perbaiki(FixBarangRusakRequest $request){
		$noseri=$request->noseri;
		$username=$request->nama_teknisi;
		$status="Onprogress";
		$tgl_diperbaiki=Carbon::now()->toDateString();

		database::perbaikiBarang($noseri, $username,$status,$tgl_diperbaiki);
		return redirect('/admin/barang-masuk/view');
	}

	public function selesai(){
		$noseri=Input::get('idbarang');
		$status="Done";
		$tgl_selesai=Carbon::now()->toDateString();
		if(Input::get('hargaJasa')!=""){
			$jasa=Input::get('hargaJasa');
		}else{
			$jasa=250000;
		}

		database::selesaiBarang($noseri,$tgl_selesai, $status, $jasa);
		return redirect('/admin/barang-masuk/view');
	}
}
