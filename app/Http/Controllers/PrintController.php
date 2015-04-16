<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PrintController extends Controller {

	public function showPDF()
    {
        //  $pdf = App::make('dompdf');
        // $pdf->loadHTML('<h1>Hello World!!</h1>');
        // return $pdf->stream();

        $pdf = \PDF::loadView('invoice');
		return $pdf->stream();
    }

}
