@extends('page-teknisi')
@section('content')
	<form method="post" action="/request_komponen">
	<h3>Silahkan Request Komponen Yang Dibutuhkan</h3>
	<hr/>
	<table class="table table-hover table-responsive" style="width:500px;">
		<tr>
			<td>
				Nama Komponen yang Dibutuhkan
			</td>
			<td>
				<select name="no_seri_komponen" style="width:150px;">
				<?php 
					$nama_komponen = DB::table('komponen')->select('nama_komponen','no_seri_komponen')->get();
					$nama_komponen = json_decode(json_encode($nama_komponen), true);
					foreach($nama_komponen as $data){
						echo '<option value="'.$data['no_seri_komponen'].'">'.$data['nama_komponen'].'</option>';
					}

				?>	
				</select>
			</td>
		</tr>
		<tr>
			<td>
				No Seri Barang Rusak
			</td>
			<td>
				<select name="no_seri_barang_rusak" style="width:150px;">
				<?php 
					$barang_rusaks = DB::table('barang_rusak')->select('nama_barang_rusak','no_seri_barang_rusak')->get();
					$barang_rusaks = json_decode(json_encode($barang_rusaks),true);
					foreach($barang_rusaks as $barang_rusak){
						echo '<option value="'.$barang_rusak['no_seri_barang_rusak'].'">'.$barang_rusak['nama_barang_rusak'].'</option>';
					}
				?>	
				</select>
			</td>
		</tr>
		<tr>
			<td>
				Jumlah Permintaan
			</td>
			<td>
				<input type="text" name="jumlah" placeholder="3" size="1">
			</td>
		</tr>
		<tr>
			<td>
			</td>
			<td>
				<input type="hidden" name="tanggal" value="<?php echo date("Y-m-d"); ?>">
				<input type="submit" name="request" value="Request Barang">
			</td>
		</tr>
	</table>
	<input name="_token" hidden value="{!! csrf_token() !!}" />
		
	</form>
@stop