<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\PDF;
use App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade;
use Input;
use App\database;



class PrintController extends Controller {

	public function showPDF()
    {
        //  $pdf = App::make('dompdf');
        // $pdf->loadHTML('<h1>Hello World!!</h1>');
        // return $pdf->stream();

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
		
		return view('invoice',compact('barang_rusak','komponens','nama_perus'));

  //       $pdf = \PDF::loadView('invoice',compact('barang_rusak','komponens','nama_perus'));
		// return $pdf->stream();
    }

}
