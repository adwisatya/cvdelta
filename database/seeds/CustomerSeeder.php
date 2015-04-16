<?php

use Illuminate\Database\Seeder;
use App\Customer as Customer;
  
class CustomerSeeder extends Seeder {
    public function run() {

    	DB::statement("SET foreign_key_checks=0");
        Customer::truncate();
        DB::statement("SET foreign_key_checks=1");

    	Customer::create( [
            'nama_perusahaan' => 'PT. ABC',
            'alamat' => 'jalan abc',
            'telepon' => '1234573894',
            'contact_person' => 'bapa abc',
        ] );
        
        Customer::create( [
            'nama_perusahaan' => 'PT. DEF',
            'alamat' => 'jalan fed',
            'telepon' => '1234573894',
            'contact_person' => 'bapa def',
        ] );
       
       Customer::create( [
            'nama_perusahaan' => 'PT. ghi',
            'alamat' => 'jalan ghi',
            'telepon' => '1234573894',
            'contact_person' => 'bapa ghi',
        ] );

       Customer::create( [
            'nama_perusahaan' => 'PT. jkl',
            'alamat' => 'jalan jkl',
            'telepon' => '1234573894',
            'contact_person' => 'bapa jkl',
        ] );

       Customer::create( [
            'nama_perusahaan' => 'PT. mno',
            'alamat' => 'jalan mno',
            'telepon' => '1234573894',
            'contact_person' => 'bapa mno',
        ] );
    }
}