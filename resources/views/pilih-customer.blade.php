@extends('page-admin')

@section('content')
	<h2>Pilih Customer</h2>
	<form method="post" action="/admin/pilih-customer" >
		<input name="_token" hidden value="{!! csrf_token() !!}" />
		{{--<input class='form-control' type="text" name="nama_perusahaan" placeholder="Nama Perusahaan">--}}
		<select class="form-control" name="nama_perusahaan">
			<option disabled selected>--pilih nama customer--</option>
			@foreach($customer as $cust)
				<option value="{{$cust->nama_perusahaan}}">{{$cust->nama_perusahaan}}</option>
			@endforeach
		</select>
		<br>
		<button id="btnSub"  class="btn btn-primary" role="button"> Pilih</button>
	</form>
@endsection