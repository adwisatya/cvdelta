@extends('page-teknisi')
@section('content')
	<form method="post" action="/request_komponen">
		<input name="_token" hidden value="{!! csrf_token() !!}" />
		Nama barang: &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<select name="no_seri_komponen">

		<?php 
			$nama_komponen = DB::table('komponen')->select('nama_komponen','no_seri_komponen')->get();
			$nama_komponen = json_decode(json_encode($nama_komponen), true);
			foreach($nama_komponen as $data){
				echo '<option value="'.$data['no_seri_komponen'].'">'.$data['nama_komponen'].'</option>';
			}

		?>	
		</select>
		<br/>
		Nomor Barang Rusak: &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<select name="no_seri_barang_rusak">

		<?php 
			$barang_rusaks = DB::table('barang_rusak')->select('nama_barang_rusak','no_seri_barang_rusak')->get();
			$barang_rusaks = json_decode(json_encode($barang_rusaks),true);
			foreach($barang_rusaks as $barang_rusak){
				echo '<option value="'.$barang_rusak['no_seri_barang_rusak'].'">'.$barang_rusak['nama_barang_rusak'].'</option>';
			}

		?>	
		</select>
		<br/>
		Jumlah permintaan: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="jumlah" placeholder="3" size="1"><br/>
		Nomor tagihan: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="no_tagihan" placeholder="3" size="2"><br/>
		<input type="hidden" name="tanggal" value="<?php echo date("Y-m-d"); ?>">
		
		<input type="submit" name="request" value="Request Barang">
	</form>
@stop