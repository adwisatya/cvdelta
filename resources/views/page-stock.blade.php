@extends('page-admin')

@section('content')
{{-- modal --}}
	<a href="#tambahStokBaru"><button id="addNewStock" class="btn btn-primary" role="button"> Tambah Stok Baru</button></a>

	<div id="tambahStokBaru" class="modalDialog">
		<div>
			<a href="#close" title="Close" class="close">X</a>
			<h2>Tambah Stok Baru</h2>
			<form method="post" action="/admin/stock-baru" >
				<input name="_token" hidden value="{!! csrf_token() !!}" />
				<div class="form-group">
					<div class="col-md-11">
						<input class='form-control' type="text" name="nama_komponen" placeholder="Nama Komponen">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-11">
						<input class='form-control' type="text" name="no_seri_komponen" placeholder="No Komponen">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-11">
						<input class='form-control' type="text" name="supplier" placeholder="Supplier">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6">
						<input class='form-control' type="text" name="harga" placeholder="Harga">
					</div>
					<div class="col-md-5">
						<select class="form-control" id="currency" name="currency"> 
							<option>IDR</option>
							<option>USD</option> 
							<option>CNY</option> 
							<option>SGD</option>
						</select> 
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-11">
						<input class='form-control' type="text" name="jumlah" placeholder="Jumlah">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-11">
						<input class='form-control' type="text" name="lokasi" placeholder="Lokasi">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-11">
						<input class='form-control' type="text" name="keterangan" placeholder="Keterangan (Optional)">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-11">
						<input class='form-control' type="text" name="min_jumlah" placeholder="Jumlah Stok Minimal">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-11">
						<button id="btnSub"  class="btn btn-primary" role="button"> Tambah Barang Baru </button>
					</div>
				</div>
			</form>
		</div>
	</div>
{{-- end modal --}}

<fontsmall>	
	<div class="row">
		<form class="navbar-form navbar-right" role="search" action="/admin/cari" method="post">
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
			<caption><h2>Stok Barang</h2></caption>
			<thead> 
				<tr> 
					<th>No Seri</th> 
					<th>Nama Komponen</th> 
					<th>Jumlah</th>
					<th>Minimal</th>
					<th>Lokasi</th> 
					<th>Keterangan</th>
					<th>Supplier</th>
					<th>Harga</th>
					<th></th>
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
						<td><input type="hidden" name="selectedNoSeri" value="{{$data->no_seri_komponen}}">
							<a href="update-stock/{{$data->no_seri_komponen}}"><button id="updateStock" class="btn btn-primary" role="button">Update</button></a> 
							<a href="tambah-stock/{{$data->no_seri_komponen}}"><button id="tambahStok" class="btn btn-warning " role="button">+</button></a>
						</td> 
					</tr>
				@endforeach
			</tbody> 
		</table>
		<br>
	</div>
</fontsmall>

<div class="col-md-5 col-md-offset-5">
	<?php echo $datas->render(); ?>
</div>
@endsection