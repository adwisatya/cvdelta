<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\database;

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
}
