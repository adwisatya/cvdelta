@extends('page-teknisi')
@section('content')
	<?php 
		$Barang = DB::table('barang_rusak')->where('status','Onprogress')->get();
		echo "<h3>Perbaikan Yang Sedang Dalam Proses</h3><hr/>";
		echo '<table class="table table-hover table-responsive">
				<tr>
					<td>
						<b>No Seri Barang Rusak</b>
					</td>
					<td>
						<b>Nama Barang Rusak</b>
					</td>
					<td>
						<b>Customer</b>
					</td>
					
					<td>
						<b>Tanggal Datang</b>
					</td>
					<td>
						<b>Tanggal Diperbaiki</b>
					</td>
					<td>
						<b>Teknisi</b>
					</td>
				</tr>';
		foreach($Barang as $barang){
			echo '
				<tr>
					<td>
						'.$barang->no_seri_barang_rusak.'
					</td>
					<td>
						'.$barang->nama_barang_rusak.'
					</td>
					<td>
						'.$barang->nama_perusahaan.'
					</td>
					
					<td>
						'.$barang->tgl_datang.'
					</td>
					<td>
						'.$barang->tgl_diperbaiki.'
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