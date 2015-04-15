@extends('page-teknisi')
@section('content')
	<form method="post" action="/teknisi">
		<input type="text" name="jumlah">
		<input type="submit" name="request" value="Request">
	</form>
@stop