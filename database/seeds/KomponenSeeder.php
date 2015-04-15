<?php

use Illuminate\Database\Seeder;
use App\Komponen as Komponen;
  
class KomponenSeeder extends Seeder {
    public function run() {

        DB::statement("SET foreign_key_checks=0");
        Komponen::truncate();
        DB::statement("SET foreign_key_checks=1");

        Komponen::create( [
            'supplier' => 'PT. A' ,
            'nama_komponen' => 'komponen A' ,
            'no_seri_komponen' => 'k010203-1' ,
            'harga' => '500000',
            'jumlah' => '500',
            'lokasi' => 'gudang1',
            'keterangan' => 'komponen yang namanya komponen A',
            'min_jumlah' => '10',
        ] );
        
        Komponen::create( [
            'supplier' => 'PT. B' ,
            'nama_komponen' => 'komponen B' ,
            'no_seri_komponen' => 'k010203-2' ,
            'harga' => '550000',
            'jumlah' => '450',
            'lokasi' => 'gudang1',
            'keterangan' => 'komponen yang namanya komponen B',
            'min_jumlah' => '15',
        ] );

        Komponen::create( [
            'supplier' => 'PT. C' ,
            'nama_komponen' => 'komponen C' ,
            'no_seri_komponen' => 'k010203-3' ,
            'harga' => '700000',
            'jumlah' => '550',
            'lokasi' => 'gudang1',
            'keterangan' => 'komponen yang namanya komponen C',
            'min_jumlah' => '7',
        ] );

        Komponen::create( [
            'supplier' => 'PT. D' ,
            'nama_komponen' => 'komponen D' ,
            'no_seri_komponen' => 'k010203-4' ,
            'harga' => '500000',
            'jumlah' => '500',
            'lokasi' => 'gudang1',
            'keterangan' => 'komponen yang namanya komponen D',
            'min_jumlah' => '10',
        ] );

        Komponen::create( [
            'supplier' => 'PT. E' ,
            'nama_komponen' => 'komponen E' ,
            'no_seri_komponen' => 'k010203-5' ,
            'harga' => '500000',
            'jumlah' => '100',
            'lokasi' => 'gudang1',
            'keterangan' => 'komponen yang namanya komponen E',
            'min_jumlah' => '5',
        ] );

        Komponen::create( [
            'supplier' => 'PT. A' ,
            'nama_komponen' => 'komponen F' ,
            'no_seri_komponen' => 'k010203-6' ,
            'harga' => '500000',
            'jumlah' => '5',
            'lokasi' => 'gudang1',
            'keterangan' => 'komponen yang namanya komponen F',
            'min_jumlah' => '5',
        ] );

        Komponen::create( [
            'supplier' => 'PT. B' ,
            'nama_komponen' => 'komponen G' ,
            'no_seri_komponen' => 'k010203-7' ,
            'harga' => '500000',
            'jumlah' => '4',
            'lokasi' => 'gudang1',
            'keterangan' => 'komponen yang namanya komponen G',
            'min_jumlah' => '5',
        ] );
    }
}