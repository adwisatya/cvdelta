<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cascadeondelete extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('barang_rusak', function($table)
		{
			$table->dropForeign('barang_rusak_username_foreign');
			$table->foreign('username')->references('username')->on('teknisi')->onDelete('cascade');
		});

		Schema::table('milik', function($table)
		{
			$table->dropForeign('milik_nama_perusahaan_foreign');
			$table->dropForeign('milik_no_seri_barang_rusak_foreign');
			$table->foreign('nama_perusahaan')->references('nama_perusahaan')->on('customer')->onDelete('cascade');
			$table->foreign('no_seri_barang_rusak')->references('no_seri_barang_rusak')->on('barang_rusak')->onDelete('cascade');
		});

		Schema::table('tagihan', function($table)
		{
			$table->dropForeign('tagihan_no_seri_komponen_foreign');
			$table->dropForeign('tagihan_no_seri_barang_rusak_foreign');
			$table->foreign('no_seri_komponen')->references('no_seri_komponen')->on('komponen')->onDelete('cascade');
			$table->foreign('no_seri_barang_rusak')->references('no_seri_barang_rusak')->on('barang_rusak')->onDelete('cascade');
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
		Schema::drop('milik');
		Schema::drop('komponen');
		Schema::drop('tagihan');
	}

}
