@extends('page-teknisi')
@section('content')
	<form method="post" action="/find-komponen">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="user" value="<?php echo Session::get('username') ?>">
		<h3>Masukkan nama barang atau no komponen yang dicari</h3>
		<br><input class="form-control" type="text" name="findComp"><br>
		<input type="submit" class="btn btn-primary" name="find" value="Cari">
	</form>
@stop
