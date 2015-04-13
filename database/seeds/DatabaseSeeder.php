<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\TeknisiSeeder;
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
		$this->command->info('Teknisi table seeded!');
		$this->command->info('Admin table seeded!');
	}

}
