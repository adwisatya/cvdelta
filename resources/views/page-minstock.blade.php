@extends('page-admin')

@section('content')
	<div class="row">
		<form class="navbar-form navbar-right" role="search" action="/admin/caristokhabis" method="post">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">

	        <div class="form-group">
	        	<input type="text" class="form-control" id="get_komponen" name="get_komponen" placeholder="Cari Komponen">
	        </div>
	        <div class="form-group">
				<div class="col-md-6 col-md-offset-4">
					<input type="submit" class="btn btn-primary" value="Cari">
				</div>
			</div>
      	</form><br><br><br>
      	
		<table class="table table-hover table-responsive"> 
			<caption><h2>Stock Minimum</h2></caption>
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
						<td>{{$data->harga}}</td>
					</tr>
				@endforeach
			</tbody> 
		</table><br>
	</div>

	<div class="col-md-5 col-md-offset-5">
		<?php echo $datas->render(); ?>
	</div>

@endsection