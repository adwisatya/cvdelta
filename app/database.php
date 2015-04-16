<?php

namespace App;
 
use Illuminate\Database\Eloquent\Model;
use DB;

class database extends Model{
	public static function getRequestedComponent(){
		return DB::table('komponen')
				->join('tagihan','komponen.no_seri_komponen','=','tagihan.no_seri_komponen')
				->join('barang_rusak','tagihan.no_seri_barang_rusak','=','barang_rusak.no_seri_barang_rusak')
				->join('teknisi','barang_rusak.username','=','teknisi.username')
				->select('komponen.no_seri_komponen','komponen.nama_komponen','barang_rusak.no_seri_barang_rusak','teknisi.username')
				->get();
	}

	public static function getStock(){
		return DB::table('komponen')->get();
	}

	public static function getMinStock(){
		return DB::table('komponen')
				->where('jumlah','<=','min_jumlah')
				->get();
	}

	// public static function getBarangSelesai(){
	// 	return DB::table('barang_rusak')
	// 				->where('status','=','fixed')
	// 				->get();
	// }

	public static function getBarangSelesai(){
		return DB::table('tagihan')
					->leftJoin('barang_rusak','tagihan.no_seri_barang_rusak','=','barang_rusak.no_seri_barang_rusak')
					->leftJoin('milik','barang_rusak.no_seri_barang_rusak','=','milik.no_seri_barang_rusak')
					// ->join('customer','milik.nama_perusahaan','=','customer.nama_perusahaan')

					// ->where('customer.nama_perusahaan','=',$nama_customer)
					// ->where ('no_seri_barang_rusak','=','inidiisiapa')
					// ->where ('status','','') -->kolom status nya belom ada
					->get();
	}

}