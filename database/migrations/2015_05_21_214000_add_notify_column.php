<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNotifyColumn extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tagihan', function($table)
		{
		    $table->boolean('notify')->default(false);
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
	}

}
