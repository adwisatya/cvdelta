@extends('page-admin')

@section('pagetitle')
	Perusahaan yang Belum Ditagih
@endsection

@section('content')
	<ul>
		@foreach($perusahaan as $perush)
			<form method="post" action="/admin/showInvoice" >
				<input name="_token" hidden value="{!! csrf_token() !!}" />
				<input class='form-control' type="hidden" name="namaPerus" value="{{$perush->nama_perusahaan}}">
				<br>
				<button id="btnSub"  class="btn btn-primary clientName" role="button">{{$perush->nama_perusahaan}}</button>
			</form>
		@endforeach
	</ul>
		
@endsection