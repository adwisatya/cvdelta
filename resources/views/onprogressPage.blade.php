@extends('page-teknisi')
@section('content')
	<?php 
		$Barang = DB::table('barang_rusak')->where('status','1')->get();
		echo "Sedang dalam proses";
		echo '<table style="width:1050px;" border="1">
				<tr>
					<td width="200px">
						No Seri Barang Rusak
					</td>
					<td width="150px">
						Tanggal Datang
					</td>
					<td width="150px">
						Harga
					</td>
					<td width="100px">
						Status
					</td>
					<td width="150px">
						Tanggal Diperbaiki
					</td>
					<td width="150px">
						Tanggal Selesai
					</td>
					<td width="150px">
						Teknisi
					</td>
				</tr>';
		foreach($Barang as $barang){
			echo '
				<tr>
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
	?>
@stop