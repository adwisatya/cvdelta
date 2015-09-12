@extends('page-admin')

@section('pagetitle')
	masukkan no invoice
@endsection

@section('content')
	<form  method="post" action="/admin/lihat_invoice">
		<input name="_token" hidden value="{!! csrf_token() !!}" />
		<input class="form-control" type="text" name="no_invoice">
		<br>
		<button class="btn btn-primary">Lihat</button>
	</form>
		
@endsection