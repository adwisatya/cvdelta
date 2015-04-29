<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class AddBarangRequest extends Request {

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
			'nama_perusahaan' => 'required',
			'nama_barang_rusak' => 'required',
			'no_seri_barang_rusak' => 'unique:barang_rusak|required',
			'no_surat_jalan' => 'required'
		];
	}

}
