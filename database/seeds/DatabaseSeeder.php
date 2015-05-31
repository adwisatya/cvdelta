<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\TeknisiSeeder;
use Illuminate\Database\AdministrasiSeeder;
use Illuminate\Database\BarangSeeder;
use Illuminate\Database\CustomerSeeder;
use Illuminate\Database\TagihanSeeder;
use Illuminate\Database\KomponenSeeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('TeknisiSeeder');
		$this->call('AdministrasiSeeder');
		$this->call('CustomerSeeder');
		$this->call('BarangSeeder');
		$this->call('KomponenSeeder');
		$this->call('TagihanSeeder');
		$this->call('CurrencySeeder');
		$this->command->info('Teknisi table seeded!');
		$this->command->info('Admin table seeded!');
		$this->command->info('Barang table seeded!');
		$this->command->info('Komponen table seeded!');
		$this->command->info('Tagihan table seeded!');
		$this->command->info('Currency table seeded!');
	}

}
