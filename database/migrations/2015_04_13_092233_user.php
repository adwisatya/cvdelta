<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class User extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('teknisi', function($table)
		{
			$table->string('username');
			$table->string('password');
			$table->string('role');

			$table->primary('username');
		});

		Schema::create('administrasi', function($table)
		{
			$table->string('username');
			$table->string('password');
			$table->string('role');

			$table->primary('username');
		});

		Schema::create('barang_rusak',function($table)
		{
			$table->string('no_seri_barang_rusak');
			$table->date('tgl_datang');
			$table->string('harga_jasa');
			$table->string('status');

			$table->primary('no_seri_barang_rusak');
			$table->date('tgl_diperbaiki');
			$table->date('tgl_selesai');
			$table->string('username');
			$table->foreign('username')->references('username')->on('teknisi');

		});

		Schema::create('customer', function($table)
		{
			$table->string('nama_perusahaan');
			$table->string('alamat');
			$table->string('telepon');
			$table->string('contact_person');

			$table->primary('nama_perusahaan');
		});

		Schema::create('milik', function($table)
		{
			$table->string('nama_perusahaan');
			$table->string('no_seri_barang_rusak');

			$table->foreign('nama_perusahaan')->references('nama_perusahaan')->on('customer');
			$table->foreign('no_seri_barang_rusak')->references('no_seri_barang_rusak')->on('barang_rusak');
		});

		Schema::create('komponen', function($table)
		{
			$table->string('supplier');
			$table->string('nama_komponen');
			$table->string('no_seri_komponen');
			$table->string('harga');
			$table->integer('jumlah')->unsigned();
			$table->string('lokasi');
			$table->string('keterangan');
			$table->integer('min_jumlah')->unsigned();

			$table->primary('no_seri_komponen');
		});

		Schema::create('tagihan', function($table)
		{
			$table->string('no_seri_komponen');
			$table->string('no_seri_barang_rusak');
			$table->date('tgl');
			$table->string('no_tagihan');

			$table->foreign('no_seri_komponen')->references('no_seri_komponen')->on('komponen');
			$table->foreign('no_seri_barang_rusak')->references('no_seri_barang_rusak')->on('barang_rusak');
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
