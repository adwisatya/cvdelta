@extends('page-admin')

@section('content')
	<h2>Tambahkan Barang Masuk</h2>
		<form method="post" action="/admin/barang-masuk" >
			<div class="form-group">
				<input name="_token" hidden value="{!! csrf_token() !!}" />
			</div>
			<div class="form-group">
				<select class='form-control' name="nama_perusahaan">
						<option disabled selected>--Pilih nama perusahaan--</option>
					@foreach($customer as $cust)
						<option value="{{$cust->nama_perusahaan}}" >{{$cust->nama_perusahaan}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<input class='form-control' type="text" name="nama_barang_rusak" placeholder="Nama Barang Rusak">
			</div>
			<div class="form-group">
				<input class='form-control' type="text" name="no_seri_barang_rusak" placeholder="No seri Barang Rusak">
			</div>
			<input class='form-control' type="text" name="no_surat_jalan" placeholder="No Surat Jalan">
			<input type="checkbox" name="isRecheck" value="1">Recheck<br>
			<br>
			<button id="btnSub"  class="btn btn-primary" role="button"> Tambah Barang Baru </button>
		</form>
		
@endsection