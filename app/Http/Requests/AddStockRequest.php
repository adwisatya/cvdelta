<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class AddStockRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'nama_komponen' => 'required',
			'no_seri_komponen' => 'required|unique:komponen',
			'supplier' => 'required',
			'harga' => 'required',
			'jumlah' => 'required|integer',
			'lokasi' => 'required',
			'min_jumlah' => 'required|integer',
		];
	}

}
