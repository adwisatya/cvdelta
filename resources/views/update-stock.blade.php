@extends('page-admin')
@section('content')
	<form id="updateStok" method="post" action="/admin/updateStock">
		<input name="_token" hidden value="{!! csrf_token() !!}" />
		<table style="width:100%;">
		@foreach($komponen as $k)
			<tr>	
				<td style="width:15%;">No Komponen</td>
				<td><input class='form-control' type="text" name="noSeri" value="{{$k->no_seri_komponen}}" readonly ></td>
			</tr>
			<tr>
				<td>Nama Komponen</td>
				<td><input class='form-control' type="text" name="namaKomponen" value="{{$k->nama_komponen}}" ></td>
			</tr>
			<tr>
				<td>Lokasi</td>
				<td><input class='form-control' type="text" name="lokasi" value="{{$k->lokasi}}"></td>
			</tr>
			<tr>
				<td>Supplier</td>
				<td><input class='form-control' type="text" name="supplier" value="{{$k->supplier}}"></td>
			</tr>
			<tr>
				<td>Harga</td>
				<td><input class='form-control' type="text" name="harga" value="{{$k->harga}}"></td>
			</tr>
			<tr>
				<td>Jumlah minimal</td>
				<td><input class='form-control' type="text" name="minJum" value="{{$k->min_jumlah}}"></td>
			</tr>
			<tr>
				<td>Jumlah</td>
				<td><input class='form-control' type="text" name="jumlah" value="{{$k->jumlah}}"readonly></td>
			</tr>
			<tr>
				<td>Keterangan</td>
				<td><input class='form-control' type="text" name="ket" value="{{$k->keterangan}}"></td>
			</tr>				
		@endforeach
		</table>
		<br>
		<button id="btnSub" form="updateStok" class="btn btn-primary" role="button" type="submit"> Update Stok </button>
	</form>	
@endsection