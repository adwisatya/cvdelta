@extends('page-admin')

@section('content')
	<div class="row">
		<table class="table table-hover table-responsive"> 
			<caption><h2>Stok Barang</h2></caption>
			<thead> 
				<tr> 
					<th>No Seri Komponen</th> 
					<th>Nama Komponen</th> 
					<th>Jumlah</th>
					<th>Jumlah Minimal</th>
					<th>Lokasi</th> 
					<th>Keterangan</th>
					<th>Supplier</th>
					<th>Harga</th>
				</tr> 
			</thead> 
			<tbody>
				@foreach ($datas as $data)
					<tr>
						<td>{{$data->no_seri_komponen}}</td>
						<td>{{$data->nama_komponen}}</td>
						<td>{{$data->jumlah}}</td>
						<td>{{$data->min_jumlah}}</td>
						<td>{{$data->lokasi}}</td>
						<td>{{$data->keterangan}}</td>
						<td>{{$data->supplier}}</td>
						<td>Rp. {{$data->harga}},00</td>
					</tr>
				@endforeach
			</tbody> 
		</table><br>
	</div>
	
@endsection