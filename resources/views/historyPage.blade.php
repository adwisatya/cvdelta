@extends('page-teknisi')
@section('content')
	<?php 
		$Barang = DB::table('barang_rusak')->where('status','Done')->get();
		echo "<h3>Barang Selesai Diperbaiki</h3><hr/>";
		echo '<table class="table table-hover table-responsive">
				<tr>
					<td>
						Nama Barang Rusak
					</td>
					<td>
						Nama Perusahaan
					</td>
					<td>
						No Seri Barang Rusak
					</td>
					<td>
						Tanggal Datang
					</td>
					<td>
						Harga
					</td>
					<td>
						Status
					</td>
					<td>
						Tanggal Diperbaiki
					</td>
					<td>
						Tanggal Selesai
					</td>
					<td>
						Teknisi
					</td>
				</tr>';
		foreach($Barang as $barang){
			echo '
				<tr>
					<td>
						'.$barang->nama_barang_rusak.'
					</td>
					<td>
						'.$barang->nama_perusahaan.'
					</td>
					<td>
						'.$barang->no_seri_barang_rusak.'
					</td>
					<td>
						'.$barang->tgl_datang.'
					</td>
					<td>
						'.$barang->harga_jasa.'
					</td>
					<td>
						'.$barang->status.'
					</td>
					<td>
						'.$barang->tgl_diperbaiki.'
					</td>
					<td>
						'.$barang->tgl_selesai.'
					</td>
					<td>
						'.$barang->username.'
					</td>
				</tr>
			';
			
		}
		echo '</table>';
		echo "<br/>";
		$Barang = DB::table('barang_rusak')->where('status','Pending')->get();
		echo "<h3>Barang Belum Diperbaiki</h3><hr/>";
		echo '<table class="table table-hover table-responsive">
				<tr>
					<td>
						Nama Barang Rusak
					</td>
					<td>
						Nama Perusahaan
					</td>
					<td>
						No Seri Barang Rusak
					</td>
					<td>
						Tanggal Datang
					</td>
					<td>
						Harga
					</td>
					<td>
						Status
					</td>
					<td>
						Teknisi
					</td>
				</tr>';
		foreach($Barang as $barang){
			echo '
				<tr>
					<td>
						'.$barang->nama_barang_rusak.'
					</td>
					<td>
						'.$barang->nama_perusahaan.'
					</td>
					<td>
						'.$barang->no_seri_barang_rusak.'
					</td>
					<td>
						'.$barang->tgl_datang.'
					</td>
					<td>
						'.$barang->harga_jasa.'
					</td>
					<td>
						'.$barang->status.'
					</td>
					<td>
						'.$barang->username.'
					</td>
				</tr>
			';
		}
		echo '</table>';

	?>
@stop