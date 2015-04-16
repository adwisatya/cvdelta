@extends('page-teknisi')
@section('content')
	<form method="post" action="/request_komponen">
			Nama barang: 
		<select name="barang">

		<?php 
			$nama_komponen = DB::table('komponen')->select('nama_komponen','no_seri_komponen')->get();
			$nama_komponen = json_decode(json_encode($nama_komponen), true);
			foreach($nama_komponen as $data){
				echo '<option value="'.$data['no_seri_komponen'].'">'.$data['nama_komponen'].'</option>';
			}

		?>	
		</select>
		<br/>
		Jumlah barang:<input type="text" name="jumlah" placeholder="3" size="1"><br/>
		<input type="submit" name="request" value="Request Barang">
	</form>
@stop