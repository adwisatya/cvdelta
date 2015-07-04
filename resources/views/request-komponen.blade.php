@extends('page-teknisi')
@section('content')
	<form method="post" action="/request_komponen">
	<h3>Silahkan Request Komponen Yang Dibutuhkan</h3>
	<hr/>
	<table class="table table-hover table-responsive" >
		<tr>
			<td>
				Nama Komponen yang Dibutuhkan
			</td>
			<td>
				<select name="noKomponen" style="width:500px;" class="btn btn-default dropdown-toggle">
				@foreach($komponen_hasil as $komp)
					<option value="{{$komp->no_seri_komponen}}">{{$komp->nama_komponen}} ({{$komp->no_seri_komponen}})</option>
				@endforeach 
				</select>
			</td>
		</tr>
		<tr>
			<td>
				No Seri Barang Rusak
			</td>
			<td>
				<select name="noBarangRusak" class="btn btn-default dropdown-toggle" style="width:250px;">
					@foreach($barang_progress as $prog)
					<option value={{$prog->no_seri_barang_rusak}}><?php echo substr($prog->no_seri_barang_rusak, 0, strpos($prog->no_seri_barang_rusak,'|'));?> </option>
					@endforeach
				</select>
			</td>
		</tr>
		<tr>
			<td>
				Jumlah Permintaan
			</td>
			<td>
				<input type="text" name="jumlah" class=" form-control" placeholder="1" style="width:50px;">
			</td>
		</tr>			
	</table>
	<input type="hidden" name="tanggal" value="<?php echo date("Y-m-d"); ?>">
	<input type="submit"  class="btn btn-primary" name="request" value="Request Barang">
	<input name="_token" hidden value="{!! csrf_token() !!}" />
		
	</form>
@stop