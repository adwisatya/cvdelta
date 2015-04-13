<?php

use Illuminate\Database\Seeder;
use App\Admin as Admin;
  
class AdministrasiSeeder extends Seeder {
    public function run() {

    	DB::statement("SET foreign_key_checks=0");
        Admin::truncate();
        DB::statement("SET foreign_key_checks=1");

    	Admin::create( [
            'username' => 'admin1' ,
            'password' => 'passwordadmin1' ,
            'role' => 'admin' ,
        ] );
        
        Admin::create( [
            'username' => 'admin2' ,
            'password' => 'passwordadmin2' ,
            'role' => 'admin' ,
        ] );

        Admin::create( [
            'username' => 'admin3' ,
            'password' => 'passwordadmin3' ,
            'role' => 'admin' ,
        ] );

        Admin::create( [
            'username' => 'admin4' ,
            'password' => 'passwordadmin4' ,
            'role' => 'admin' ,
        ] );

        Admin::create( [
            'username' => 'admin5' ,
            'password' => 'passwordadmin5' ,
            'role' => 'admin' ,
        ] );
    }
}