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
		DB::statement("ALTER TABLE `customer` CHANGE `alamat` `alamat` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL");
		DB::statement("ALTER TABLE `customer` CHANGE `telepon` `telepon` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL");
		DB::statement("ALTER TABLE `customer` CHANGE `contact_person` `contact_person` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL");
		DB::statement("ALTER TABLE `komponen` CHANGE `keterangan` `keterangan` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL");
		DB::statement("ALTER TABLE `komponen` CHANGE `supplier` `supplier` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL");
		DB::statement("ALTER TABLE `barang_rusak` CHANGE `tgl_diperbaiki` `tgl_diperbaiki` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL");
		DB::statement("ALTER TABLE `barang_rusak` CHANGE `tgl_selesai` `tgl_selesai` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL");
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
	}

}
