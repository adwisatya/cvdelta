<?php

use Illuminate\Database\Seeder;
use App\Barang as Barang;
  
class BarangSeeder extends Seeder {
    public function run() {

    	DB::statement("SET foreign_key_checks=0");
        Barang::truncate();
        DB::statement("SET foreign_key_checks=1");

    	Barang::create( [
            'nama_perusahaan' => 'PT. ABC',
            'nama_barang_rusak' => 'barang A',
            'no_seri_barang_rusak' => '12345-1',
            'tgl_datang' => '2015-04-10',
            'harga_jasa' => '2000000',
            'status' => 'Onprogress',
            'tgl_diperbaiki' => '2015-04-11',
            'username' => 'teknisi1',
        ] );

        Barang::create( [
            'nama_perusahaan' => 'PT. ABC',
            'nama_barang_rusak' => 'barang A',
            'no_seri_barang_rusak' => '12345-6',
            'tgl_datang' => '2015-04-10',
            'harga_jasa' => '2000000',
            'status' => 'Onprogress',
            'tgl_diperbaiki' => '2015-04-11',
        ] );

        Barang::create( [
            'nama_perusahaan' => 'PT. ABC',
            'nama_barang_rusak' => 'barang A',
            'no_seri_barang_rusak' => '12345-7',
            'tgl_datang' => '2015-04-10',
            'harga_jasa' => '2000000',
            'status' => 'Onprogress',
            'tgl_diperbaiki' => '2015-04-11',
        ] );

        Barang::create( [
            'nama_perusahaan' => 'PT. DEF',
            'nama_barang_rusak' => 'barang B',
            'no_seri_barang_rusak' => '12345-2',
            'tgl_datang' => '2015-04-10',
            'harga_jasa' => '2000000',
            'status' => 'Onprogress',
            'tgl_diperbaiki' => '2015-04-11',
            'username' => 'teknisi2',
        ] );

        Barang::create( [
            'nama_perusahaan' => 'PT. ghi',
            'nama_barang_rusak' => 'barang C',
            'no_seri_barang_rusak' => '12345-3',
            'tgl_datang' => '2015-04-10',
            'harga_jasa' => '2000000',
            'status' => 'Onprogress',
            'tgl_diperbaiki' => '2015-04-11',
        ] );

        Barang::create( [
            'nama_perusahaan' => 'PT. jkl',
            'nama_barang_rusak' => 'barang D',
            'no_seri_barang_rusak' => '12345-4',
            'tgl_datang' => '2015-04-10',
            'harga_jasa' => '2000000',
            'status' => 'Onprogress',
            'tgl_diperbaiki' => '2015-04-11',
            'username' => 'teknisi3',
        ] );

        Barang::create( [
            'nama_perusahaan' => 'PT. mno',
            'nama_barang_rusak' => 'barang E',
            'no_seri_barang_rusak' => '12345-5',
            'tgl_datang' => '2015-04-10',
            'harga_jasa' => '2000000',
            'status' => 'Onprogress',
            'tgl_diperbaiki' => '2015-04-11',
            'username' => 'teknisi1',
        ] );
        
        
    }
}