@extends('page-admin')

@section('content')
	<div class="row">
		<table class="table table-hover table-responsive"> 
			<caption><h2>Requested Component</h2></caption>
			<thead> 
				<tr> 
					<th>No Seri Komponen</th> 
					<th>Nama Komponen</th> 
					<th>Barang Terkait</th>
					<th>Teknisi</th> 
					<th>Approve</th>
				</tr> 
			</thead> 
			<tbody>
				@foreach ($datas as $data)
					<tr>
						<td>{{$data->no_seri_komponen}}</td>
						<td>{{$data->nama_komponen}}</td>
						<td>{{$data->no_seri_barang_rusak}}</td>
						<td>{{$data->username}}</td>
						<td>
							<a href="#" class="btn btn-success" role="button"> Approve </a>
							<a href="#" class="btn btn-danger" role="button"> Decline </a>
						</td>
					</tr>
				@endforeach
			</tbody> 
		</table><br>	
	</div>
	
@endsection