@extends('page-admin')
@section('content')
	@foreach($komponen as $komp)
		<form id="tambahStok" method="post" action="/admin/tambah-jumlah-stok">
			<input name="_token" hidden value="{!! csrf_token() !!}" />
			<input class='form-control' type="text" name="nama_komponen" value="{{$komp->nama_komponen}} " readonly >
			<input class='form-control' type="text" name="noSeri" value="{{$komp->no_seri_komponen}}" readonly ><br>
			<input class='form-control' type="text" name="supplier" value="{{$komp->supplier}}" readonly ><br>
			<input class='form-control' type="text" name="jumlah" placeholder="jumlah" >
			<br>
			<button id="btnSub" form="tambahStok" class="btn btn-primary" role="button" type="submit"> Tambah Stok </button>
		</form>	
	@endforeach
@endsection