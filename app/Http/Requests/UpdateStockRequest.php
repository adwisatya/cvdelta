<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateStockRequest extends Request {

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
			'namaKomponen' => 'required',
			'lokasi' => 'required',
			'supplier' => 'required',
			'harga' => 'required',
			'lokasi' => 'required',
			'minJum' => 'required|integer'
		];
	}

}
