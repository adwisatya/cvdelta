<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IdKomponen extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tagihan',function($table)
		{
			$table->dropForeign('tagihan_no_seri_komponen_foreign');
			$table->dropColumn('no_seri_komponen');
		});

		Schema::table('komponen', function($table)
		{
			$table->dropPrimary('no_seri_komponen');
		});

		Schema::table('komponen', function($table)
		{
			$table->increments('id');
		});

		Schema::table('tagihan', function($table)
		{
			$table->integer('id')->unsigned();
			$table->foreign('id')->references('id')->on('komponen')->onDelete('cascade');
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
