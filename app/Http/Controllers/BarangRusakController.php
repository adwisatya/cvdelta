<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use App\database;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BarangRusakController extends Controller {

	public function addBarang(){

		$nama_perusahaan = Input::get('nama_perusahaan');
		$nama_barang_rusak = Input::get('nama_barang_rusak');
		$no_seri_barang_rusak = Input::get('no_seri_barang_rusak');
		$no_surat_jalan = Input::get('no_surat_jalan');


		database::saveBarang($nama_barang_rusak, $nama_perusahaan, $no_seri_barang_rusak, $no_surat_jalan);
		return redirect('/admin');
	}

	public function viewBarang(){
		$barang_rusak=database::getBarangRusak();
		return view('barang-rusak', compact('barang_rusak'));
		
	}

	public function perbaiki(){
		$noseri=Input::get('noseri');
		$username=Input::get('nama_teknisi');
		$status="Onprogress";
		$tgl_diperbaiki=Carbon::now()->toDateString();

		database::perbaikiBarang($noseri, $username,$status,$tgl_diperbaiki);
		return redirect('/admin/barang-masuk/view');
	}

	public function selesai(){
		$noseri=Input::get('idbarang');
		$status="Done";
		$tgl_selesai=Carbon::now()->toDateString();

		database::selesaiBarang($noseri,$tgl_selesai, $status);
		return redirect('/admin/barang-masuk/view');
	}
}
