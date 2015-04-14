<?php

use Illuminate\Database\Seeder;
use App\Teknisi as Teknisi;
  
class TeknisiSeeder extends Seeder {
    public function run() {

        DB::statement("SET foreign_key_checks=0");
        Teknisi::truncate();
        DB::statement("SET foreign_key_checks=1");

        Teknisi::create( [
            'username' => 'teknisi1' ,
            'password' => 'passwordteknisi1' ,
            'role' => 'teknisi' ,
        ] );
        
        Teknisi::create( [
            'username' => 'teknisi2' ,
            'password' => 'passwordteknisi2' ,
            'role' => 'teknisi' ,
        ] );

        Teknisi::create( [
            'username' => 'teknisi3' ,
            'password' => 'passwordteknisi3' ,
            'role' => 'teknisi' ,
        ] );

        Teknisi::create( [
            'username' => 'teknisi4' ,
            'password' => 'passwordteknisi4' ,
            'role' => 'teknisi' ,
        ] );

        Teknisi::create( [
            'username' => 'teknisi5' ,
            'password' => 'passwordteknisi5' ,
            'role' => 'teknisi' ,
        ] );
    }
}