<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Currency extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('currency', function($table)
		{
			$table->increments('id');
			$table->string('currency');
			$table->float('IDR');
		});

		Schema::table('komponen', function($table)
		{
		    DB::statement('ALTER TABLE komponen MODIFY COLUMN harga VARCHAR(255)');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('teknisi');
		Schema::drop('administrasi');
		Schema::drop('barang_rusak');
		Schema::drop('customer');
		Schema::drop('komponen');
		Schema::drop('tagihan');
		Schema::drop('currency');
	}

}
