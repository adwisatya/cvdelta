@extends('page-admin')

@section('content')
	<h2>Tambahkan Barang Masuk</h2>
		<form method="post" action="/admin/barang-masuk" >
			<input name="_token" hidden value="{!! csrf_token() !!}" />
			<input class='form-control' type="text" name="nama_perusahaan" placeholder="Nama Perusahaan">
			<input class='form-control' type="text" name="nama_barang_rusak" placeholder="Nama Barang Rusak">
			<input class='form-control' type="text" name="no_seri_barang_rusak" placeholder="No seri">
			<input class='form-control' type="text" name="no_surat_jalan" placeholder="No Surat Jalan">
			<br>
			<button id="btnSub"  class="btn" role="button"> Tambah Barang Baru </button>
		</form>
@stop