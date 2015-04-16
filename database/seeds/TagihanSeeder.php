<?php

use Illuminate\Database\Seeder;
use App\Tagihan as Tagihan;
  
class TagihanSeeder extends Seeder {
    public function run() {

    	DB::statement("SET foreign_key_checks=0");
        Tagihan::truncate();
        DB::statement("SET foreign_key_checks=1");

    	Tagihan::create( [
            'no_seri_komponen' => 'k010203-1' ,
            'no_seri_barang_rusak' => '12345-1' ,
            'tgl' => '2015-04-13' ,
            'no_tagihan' => '234',
            'status' => 'requested',
        ] );

        Tagihan::create( [
            'no_seri_komponen' => 'k010203-2' ,
            'no_seri_barang_rusak' => '12345-1' ,
            'tgl' => '2015-04-13' ,
            'no_tagihan' => '234',
            'status' => 'billed',
        ] );

        Tagihan::create( [
            'no_seri_komponen' => 'k010203-3' ,
            'no_seri_barang_rusak' => '12345-2' ,
            'tgl' => '2015-04-13' ,
            'no_tagihan' => '234',
            'status' => 'requested',
        ] );

        Tagihan::create( [
            'no_seri_komponen' => 'k010203-4' ,
            'no_seri_barang_rusak' => '12345-3' ,
            'tgl' => '2015-04-13' ,
            'no_tagihan' => '234',
            'status' => 'approved',
        ] );

        Tagihan::create( [
            'no_seri_komponen' => 'k010203-5' ,
            'no_seri_barang_rusak' => '12345-4' ,
            'tgl' => '2015-04-13' ,
            'no_tagihan' => '234',
            'status' => 'billed',
        ] );

        Tagihan::create( [
            'no_seri_komponen' => 'k010203-5' ,
            'no_seri_barang_rusak' => '12345-6' ,
            'tgl' => '2015-04-13' ,
            'no_tagihan' => '234',
            'status' => 'billed',
        ] );
        
        Tagihan::create( [
            'no_seri_komponen' => 'k010203-5' ,
            'no_seri_barang_rusak' => '12345-7' ,
            'tgl' => '2015-04-13' ,
            'no_tagihan' => '234',
            'status' => 'billed',
        ] );

        Tagihan::create( [
            'no_seri_komponen' => 'k010203-5' ,
            'no_seri_barang_rusak' => '12345-7' ,
            'tgl' => '2015-04-13' ,
            'no_tagihan' => '234',
            'status' => 'billed',
        ] );

        Tagihan::create( [
            'no_seri_komponen' => 'k010203-5' ,
            'no_seri_barang_rusak' => '12345-7' ,
            'tgl' => '2015-04-13' ,
            'no_tagihan' => '234',
            'status' => 'billed',
        ] );

        Tagihan::create( [
            'no_seri_komponen' => 'k010203-2' ,
            'no_seri_barang_rusak' => '12345-1' ,
            'tgl' => '2015-04-13' ,
            'no_tagihan' => '234',
            'status' => 'billed',
        ]);

        Tagihan::create( [
            'no_seri_komponen' => 'k010203-5' ,
            'no_seri_barang_rusak' => '12345-6' ,
            'tgl' => '2015-04-13' ,
            'no_tagihan' => '234',
            'status' => 'billed',
        ] );
    }
}