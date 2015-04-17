@extends('page-admin')

@section('content')
	<div class="row">
		<form method="post" id="form_data" action="/admin/request/approval" >
			<input name="_token" hidden value="{!! csrf_token() !!}" />
			<input class='form-control' type="hidden" id="noserikomponen" name="noserikomponen">
			<input class='form-control' type="hidden" id="noseribarangrusak" name="noseribarangrusak">
			<input class='form-control' type="hidden" id="username" name="username">
			<input class='form-control' type="hidden" id="tombol" name="tombol">
		</form>
		<table class="table table-hover table-responsive"> 
			<caption><h2>Requested Component</h2></caption>
			<thead> 
				<tr> 
					<th>No Seri Komponen</th> 
					<th>Nama Komponen</th> 
					<th>Jumlah</th>
					<th>Barang Terkait</th>
					<th>Teknisi</th> 
					<th>Approve</th>
				</tr> 
			</thead> 
			<tbody>
				@foreach ($datas as $data)
					<tr>
						<td class="nokomponen">{{$data->no_seri_komponen}}</td>
						<td class="namakomponen">{{$data->nama_komponen}}</td>
						<td class="nobarang" >{{$data->no_seri_barang_rusak}}</td>
						<td class="user">{{$data->username}}</td>
						<td>
							<button form="form_data" class="btn btn-success approve" role="button"> Approve </a>&nbsp;
							<button form="form_data" class="btn btn-danger decline" role="button"> Decline </a>
						</td>
					</tr>
				@endforeach
			</tbody> 
		</table><br>	
	</div>
	
@endsection