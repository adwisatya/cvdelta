<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Nullablekey extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::statement("ALTER TABLE `barang_rusak` CHANGE `username` `username` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL");
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
		Schema::drop('milik');
		Schema::drop('komponen');
		Schema::drop('tagihan');
	}

}
