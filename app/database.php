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
				->where('tagihan.status','=','requested')
				->select('komponen.no_seri_komponen','komponen.nama_komponen','barang_rusak.no_seri_barang_rusak','teknisi.username')
				->distinct()
				->get();
	}

	public static function getUnnotifiedRequestedComponent(){
		return DB::table('komponen')
				->join('tagihan','komponen.no_seri_komponen','=','tagihan.no_seri_komponen')
				->join('barang_rusak','tagihan.no_seri_barang_rusak','=','barang_rusak.no_seri_barang_rusak')
				->join('teknisi','barang_rusak.username','=','teknisi.username')
				->where('tagihan.status','=','requested')
				->where('tagihan.notify','=','0')
				->select('komponen.no_seri_komponen','komponen.nama_komponen','barang_rusak.no_seri_barang_rusak','teknisi.username')
				->distinct()
				->get();
	}

	public static function changeUnnotifiedStatus() {
		DB::table('tagihan')
				->where('notify','=','0')
				->update(array('notify' => '1'));
	}

	public static function getCountRequested($no_seri_komponen, $no_seri_barang_rusak, $teknisi){
		return DB::table('komponen')
				->join('tagihan','komponen.no_seri_komponen','=','tagihan.no_seri_komponen')
				->join('barang_rusak','tagihan.no_seri_barang_rusak','=','barang_rusak.no_seri_barang_rusak')
				->join('teknisi','barang_rusak.username','=','teknisi.username')
				->where('tagihan.status','=','requested')
				->where('komponen.no_seri_komponen','=',$no_seri_komponen)
				->where('barang_rusak.no_seri_barang_rusak','=',$no_seri_barang_rusak)
				->where('teknisi.username','=',$teknisi)
				->select('komponen.no_seri_komponen','komponen.nama_komponen','barang_rusak.no_seri_barang_rusak','teknisi.username')
				->count();
	}

	public static function getItemStock($no_seri_komponen){
		return DB::table('komponen')
					->where('no_seri_komponen', '=', $no_seri_komponen)
					->select('komponen.jumlah', 'komponen.min_jumlah')
					->get();
	}

	public static function getStock(){
		return Komponen::paginate(10);
	}

	public static function getMinStock(){
		return Komponen::whereRaw('jumlah <= min_jumlah')
				->paginate(10);
	}

	public static function getBarangSelesai($nama_perus){
		return DB::table('barang_rusak')
					->where('nama_perusahaan','=',$nama_perus)
					->where('status','=','done')
					->get();
	}

	public static function getComponentUsed($id_barang){
		return DB::table('tagihan')
					->where('no_seri_barang_rusak','=',$id_barang)
					->where('status','=','approved')
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
		$customer = new Customer;
		$customer->nama_perusahaan = $nama;
		$customer->alamat = $alamat;
		$customer->telepon = $telepon;
		$customer->contact_person = $cp;
		$customer->save();
	}

	public static function getNKomponen($id_barang,$id_komp){
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

	public static function saveStock($no_seri_komponen, $jumlah){
		DB::table('komponen')
			->where('no_seri_komponen',$no_seri_komponen)
			->increment('jumlah', $jumlah);
	}

	public static function saveBarang($nama_barang_rusak, $nama_perusahaan, $no_seri_barang_rusak, $no_surat_jalan, $isRecheck){
		DB::table('barang_rusak')->insert(
			[
				'nama_barang_rusak' => $nama_barang_rusak,
				'nama_perusahaan' => $nama_perusahaan,
				'no_seri_barang_rusak' => $no_seri_barang_rusak,
				'no_surat_jalan' => $no_surat_jalan,
				'tgl_datang' => Carbon::now()->toDateString(),
				'harga_jasa' => 0,
				'status' => 'pending',
				'recheck' => $isRecheck,
			]);
	}

	public static function getBarangRusak(){
		return DB::table('barang_rusak')
				->where('status','pending')
				->orWhere('status','Onprogress')
				->orderBy('tgl_datang')
				->get();
	}

	public static function getBarangOnProgress(){
		return DB::table('barang_rusak')
				->where('status','Onprogress')
				->get();
	}	

	public static function perbaikiBarang($noseri, $username,$status,$tgl_diperbaiki){
		DB::table('barang_rusak')
			->where('no_seri_barang_rusak','=',$noseri)
			->update(
				[
					'username' => $username,
					'status' => $status,
					'tgl_diperbaiki' => $tgl_diperbaiki,
				]);
	}

	public static function approval($status, $no_seri_komponen, $no_seri_barang_rusak, $username){
		if ($status=="approved"){
			DB::table('komponen')
				->join('tagihan','komponen.no_seri_komponen','=','tagihan.no_seri_komponen')
				->join('barang_rusak','tagihan.no_seri_barang_rusak','=','barang_rusak.no_seri_barang_rusak')
				->join('teknisi','barang_rusak.username','=','teknisi.username')
				->where('komponen.no_seri_komponen','=', $no_seri_komponen)
				->where('barang_rusak.no_seri_barang_rusak','=', $no_seri_barang_rusak)
				->where('teknisi.username','=',$username)
				->update([
						'tagihan.status' => $status
					]);
		} else{
			DB::table('komponen')
				->join('tagihan','komponen.no_seri_komponen','=','tagihan.no_seri_komponen')
				->join('barang_rusak','tagihan.no_seri_barang_rusak','=','barang_rusak.no_seri_barang_rusak')
				->join('teknisi','barang_rusak.username','=','teknisi.username')
				->where('komponen.no_seri_komponen','=', $no_seri_komponen)
				->where('barang_rusak.no_seri_barang_rusak','=', $no_seri_barang_rusak)
				->where('teknisi.username','=',$username)
				->update([
						'tagihan.status' => 'declined'
					]);
		}
	}

	public static function delDeclined(){
		DB::table('tagihan')
			->where ('status','=','declined')
			->delete();
	}

	public static function selesaiBarang($noseri,$tgl_selesai,$status){
		DB::table('barang_rusak')
			->where('no_seri_barang_rusak','=',$noseri)
			->update(
				[
					'status' => $status,
					'tgl_selesai' => $tgl_selesai,
				]);
	}

	public static function updateJumlahKomponen($nokomponen, $jumlah){
		DB::table('komponen')
			->where('no_seri_komponen','=',$nokomponen)
			->update(['jumlah' => $jumlah]);
	}

	public static function getAdmin(){
		return DB::table('administrasi')
				->get();
	}

	public static function getTeknisi(){
		return DB::table('teknisi')
				->get();
	}
	public static function getKomponenLike($komp){
		return DB::table('komponen')
				->where('nama_komponen', 'LIKE', '%'.$komp.'%')
				->orWhere('no_seri_komponen', 'LIKE', '%'.$komp.'%')
				->get();
	}
	public static function getKomponenById($komp){
		return DB::table('komponen')
				->where('no_seri_komponen', '=', $komp)
				->get();
	}
	public static function deleteCustomer($namaPerusahaan){
		DB::table('customer')
				->where('nama_perusahaan','=',$namaPerusahaan)
				->delete();
	}
	public static function updateStock($noSeri, $namaKomponen, $lokasi, $supplier, $harga, $minJum, $ket){
		DB::table('komponen')
			->where('no_seri_komponen','=',$noSeri)
			->update(
				[
					'nama_komponen' => $namaKomponen,
					'lokasi' => $lokasi,
					'supplier' => $supplier,
					'harga' => $harga,
					'min_jumlah' => $minJum,
					'keterangan' => $ket,
				]);
	}
	public static function getBarangSelesaionMonth($nama_perus,$month){
		return DB::table('barang_rusak')
			->where('nama_perusahaan','=',$nama_perus)
			->where('status','=','done')
			->where(DB::raw('MONTH(tgl_selesai)'), '=', $month)
			->get();
	}
	public static function getPerusahaanUnbilledTagihan(){
		return DB::table('tagihan')
			->join('barang_rusak','tagihan.no_seri_barang_rusak','=','barang_rusak.no_seri_barang_rusak')
			->select('nama_perusahaan')
			->where('barang_rusak.status','=','Done')
			->distinct()
			->get();
	}
	public static function getUnbilledBarangSelesai($nama_perus){
		return DB::table('barang_rusak')
			->where('nama_perusahaan','=',$nama_perus)
			->where('status','=','done')
			->get();
	}

	public static function findItem($item) {
		return Komponen::where('nama_komponen', 'LIKE', '%'.$item.'%')->paginate(10);
	}

	public static function findMinItem($item) {
		return Komponen::whereRaw('jumlah <= min_jumlah')->where('nama_komponen', 'LIKE', '%'.$item.'%')->paginate(10);
	}

	public static function getBarangSelesai_Billed(){
		return DB::table('barang_rusak')
			->where('status','=','billed')
			->get();
	}

}