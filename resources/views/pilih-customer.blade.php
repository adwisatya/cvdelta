@extends('page-admin')

@section('content')
	<h2>Pilih Customer</h2>
	<form method="post" action="/admin/pilih-customer" >
		<input name="_token" hidden value="{!! csrf_token() !!}" />
		<input class='form-control' type="text" name="nama_perusahaan" placeholder="Nama Perusahaan">
		<br>
		<button id="btnSub"  class="btn" role="button"> Pilih</button>
	</form>
@endsection