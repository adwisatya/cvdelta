<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\database;


use Illuminate\Http\Request;

class SiteController extends Controller {

	public function index(){
		return view('index');
	}
	public function teknisiPage(){
		return view('dashboard-teknisi');
	}
	public function adminPage(){
		return view('page-admin');
	}
	public function request(){
		return view('page-request');
	}

	public function invoice(){
		$barang_rusak = database::getBarangSelesai();
		// $components = database::getUsedComponent();
		return view('invoice',compact('barang_rusak'));
	}
}
