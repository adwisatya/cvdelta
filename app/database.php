<?php

namespace App;
 
use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;

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
				// ->where('jumlah','<=', array('min_jumlah'))
				->whereRaw('jumlah <= min_jumlah')
				->get();
	}

	// public static function getBarangSelesai(){
	// 	return DB::table('barang_rusak')
	// 				->where('status','=','fixed')
	// 				->get();
	// }

	// public static function getBarangSelesai($nama_perus){
	// 	return DB::table('komponen')
	// 				->join('tagihan','komponen.no_seri_komponen','=','tagihan.no_seri_komponen')
	// 				->join('barang_rusak','tagihan.no_seri_barang_rusak','=','barang_rusak.no_seri_barang_rusak')
	// 				->join('customer','barang_rusak.nama_perusahaan','=','customer.nama_perusahaan')
	// 				// ->where ('no_seri_barang_rusak','=','inidiisiapa')
	// 				->where('customer.nama_perusahaan','=',$nama_perus)
	// 				//->where ('status','=','requested') //-->kolom status nya belom ada
	// 				->get();
	// }

		public static function getBarangSelesai($nama_perus){
		return DB::table('barang_rusak')
					->where('nama_perusahaan','=',$nama_perus)
					//status udh selesai
					->get();
	}

	public static function getComponentUsed($id_barang){
		return DB::table('tagihan')
					->where('no_seri_barang_rusak','=',$id_barang)
					// ->orderBy('no_seri_komponen','asc')
					->distinct()
					->get();
	}


	public static function saveComponent($no, $nama, $jumlah, $lokasi, $keterangan, $supplier, $harga){
		DB::table('komponen')->insert(
			[
				'supplier' => $supplier,
				'nama_komponen' => $nama,
				'no_seri_komponen' => $no,
				'harga' => $harga,
				'jumlah' => $jumlah,
				'lokasi' => $lokasi,
				'keterangan' => $keterangan,
				'min_jumlah' => 10,
			]);
	}

	public static function customer(){
		return DB::table('customer')->get();
	}

	public static function saveCustomer($nama,$alamat,$telepon,$cp){
		DB::table('customer')->insert(
			[
				'nama_perusahaan' => $nama,
				'alamat' => $alamat,
				'telepon' => $telepon,
				'contact_person' => $cp,
			]);
	}

	public static function getNKomponen($id_barang,$id_komp){
		// echo "tes: ".$id_barang;
		// echo "tes2: ".$id_komp."<br>";
		// return DB::statement('select count(*) from tagihan where no_seri_komponen = ? and no_seri_barang_rusak = ?',array('k010203-5','12345-7'));
		return DB::table('tagihan')
					->where('no_seri_komponen',$id_komp)
					->where('no_seri_barang_rusak',$id_barang)
					->count();
	}

	public static function getPrice($id_komponen){
		return DB::table('komponen')
					->select('harga')
					->where('no_seri_komponen','=',$id_komponen)
					->get();
	}

	public static function saveNewStock($nama_komponen, $no_seri_komponen, $supplier, $harga, $jumlah, $lokasi, $keterangan, $min_jumlah){
		DB::table('komponen')->insert(
			[
				'nama_komponen' => $nama_komponen,
				'no_seri_komponen' => $no_seri_komponen,
				'supplier' => $supplier,
				'harga' => $harga,
				'jumlah' => $jumlah,
				'lokasi' => $lokasi,
				'keterangan' => $keterangan,
				'min_jumlah' => $min_jumlah,
			]);
	}

	public static function saveStock($nama_komponen, $no_seri_komponen, $jumlah){
		DB::table('komponen')
			->where('nama_komponen',$nama_komponen)
			->orWhere('no_seri_komponen',$no_seri_komponen)
			->increment('jumlah', $jumlah);
	}

	public static function saveBarang($nama_barang_rusak, $nama_perusahaan, $no_seri_barang_rusak, $no_surat_jalan){
		DB::table('barang_rusak')->insert(
			[
				'nama_barang_rusak' => $nama_barang_rusak,
				'nama_perusahaan' => $nama_perusahaan,
				'no_seri_barang_rusak' => $no_seri_barang_rusak,
				'no_surat_jalan' => $no_surat_jalan,
				'tgl_datang' => Carbon::now()->toDateString(),
				'harga_jasa' => 0,
				'status' => 'pending',
			]);
	}

	public static function getBarangRusak(){
		return DB::table('barang_rusak')
				->where('status','pending')
				->get();
	}

	public static function perbaikiBarang($username,$status,$tgl_diperbaiki){
		//update database
	}

}