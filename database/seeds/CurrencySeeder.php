<?php

use Illuminate\Database\Seeder;
use App\Currency as Currency;
  
class CurrencySeeder extends Seeder {
    public function run() {

        DB::statement("SET foreign_key_checks=0");
        Currency::truncate();
        DB::statement("SET foreign_key_checks=1");

        Currency::create( [
            'currency' => 'USD' ,
            'IDR' => '13215.50' ,
        ] );

        Currency::create( [
            'currency' => 'CNY' ,
            'IDR' => '2131.10' ,
        ] );

        Currency::create( [
            'currency' => 'SGD' ,
            'IDR' => '9806.33' ,
        ] );

        Currency::create( [
            'currency' => 'IDR' ,
            'IDR' => '1' ,
        ] );
    }
}