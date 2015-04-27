@extends('page-admin')

@section('content')
	<div class="row">
		<form method="post" id="form_data" action="/admin/request/approval" >
			<input name="_token" hidden value="{!! csrf_token() !!}" />
			<input class='form-control' type="hidden" id="noserikomponen" name="noserikomponen">
			<input class='form-control' type="hidden" id="jumlahkomponen" name="jumlahkomponen">
			<input class='form-control' type="hidden" id="stokkomponen" name="stokkomponen">
			<input class='form-control' type="hidden" id="noseribarangrusak" name="noseribarangrusak">
			<input class='form-control' type="hidden" id="username" name="username">
			<input class='form-control' type="hidden" id="tombol" name="tombol">
		</form>
		<form method="post" id="form_data2" action="/admin/request/approval" >
			<input name="_token" hidden value="{!! csrf_token() !!}" />
			<input class='form-control' type="hidden" id="noserikomponen2" name="noserikomponen2">
			<input class='form-control' type="hidden" id="jumlahkomponen2" name="jumlahkomponen2">
			<input class='form-control' type="hidden" id="stokkomponen2" name="stokkomponen2">
			<input class='form-control' type="hidden" id="noseribarangrusak2" name="noseribarangrusak2">
			<input class='form-control' type="hidden" id="username2" name="username2">
			<input class='form-control' type="hidden" id="tombol2" name="tombol2">
		</form>
		<table class="table table-hover table-responsive"> 
			<caption><h2>Requested Component</h2></caption>
			<thead> 
				<tr> 
					<th>No Seri Komponen</th> 
					<th>Nama Komponen</th> 
					<th>Jumlah</th>
					<th>Stok</th>
					<th>Barang Terkait</th>
					<th>Teknisi</th> 
					<th>Approve</th>
				</tr> 
			</thead> 
			<tbody>
				@foreach ($datas as $data)
					<tr>
						<td class="nokomponen">{{$data['no_seri_komponen']}}</td>
						<td class="namakomponen">{{$data['nama_komponen']}}</td>
						<td class="jumlah">{{$data['jumlah']}}</td>
						<td class="stok">{{$data['min']}}</td>
						<td class="nobarang" >{{$data['no_seri_barang_rusak']}}</td>
						<td class="user">{{$data['username']}}</td>
						<td>
							<button form="form_data" class="btn btn-success approve" role="button"> Approve </a>&nbsp;
							<button form="form_data2" class="btn btn-danger decline" role="button"> Decline </a>
						</td>
					</tr>
				@endforeach
			</tbody> 
		</table><br>	
	</div>
	
@endsection