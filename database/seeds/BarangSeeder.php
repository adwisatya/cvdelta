<?php

use Illuminate\Database\Seeder;
use App\Barang as Barang;
  
class BarangSeeder extends Seeder {
    public function run() {

    	DB::statement("SET foreign_key_checks=0");
        Barang::truncate();
        DB::statement("SET foreign_key_checks=1");

    	Barang::create( [
            'no_seri_barang_rusak' => '12345-1',
            'tgl_datang' => '2015-04-10',
            'harga_jasa' => '2000000',
            'status' => 'Pending',
            'tgl_diperbaiki' => '2015-04-11',
        ] );
        
        Barang::create( [
            'no_seri_barang_rusak' => '12345-2',
            'tgl_datang' => '2015-04-9',
            'harga_jasa' => '2000000',
            'status' => 'Fixed',
            'tgl_diperbaiki' => '2015-04-10',
            'tgl_selesai' => '2015-04-13',
            'username' => 'teknisi2',
        ] );

        Barang::create( [
            'no_seri_barang_rusak' => '12345-3',
            'tgl_datang' => '2015-04-8',
            'harga_jasa' => '2000000',
            'status' => 'On Progress',
            'tgl_diperbaiki' => '2015-04-9',
            'username' => 'teknisi3',
        ] );

        Barang::create( [
            'no_seri_barang_rusak' => '12345-4',
            'tgl_datang' => '2015-04-7',
            'harga_jasa' => '2000000',
            'status' => 'Fixed',
            'tgl_diperbaiki' => '2015-04-8',
            'tgl_selesai' => '2015-04-13',
            'username' => 'teknisi4',
        ] );

        Barang::create( [
            'no_seri_barang_rusak' => '12345-5',
            'tgl_datang' => '2015-04-6',
            'harga_jasa' => '2000000',
            'status' => 'On Progress',
            'tgl_diperbaiki' => '2015-04-11',
            'username' => 'teknisi5',
        ] );
    }
}