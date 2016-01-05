@extends('page-admin')

@section('content')
{{-- modal --}}
	<div class="row">
		<div class="col-sm-6">
			<!-- <a href="#tambahStokBaru"><button id="" class="btn btn-primary" role="button"> Tambah Stok Baru</button></a> -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahStokBaru">Tambah Komponen Baru</button>
		</div>
		<div class="col-sm-6">
				<a href="{{ url('/admin/minimum') }}"><button id="addNewStock" class="btn btn-danger pull-right" role="button">Lihat Stok Habis <span>({{$minStockCount}})</span></button></a>
		</div>
	</div>

	<div id="tambahStokBaru" class="modal fade" role="dialog">
	  <div class="modal-dialog">
	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Tambah Stok Komponen Baru</h4>
	      </div>
	      <div class="modal-body">
			<form method="post" action="/admin/stock-baru" >
				<input name="_token" hidden value="{!! csrf_token() !!}" />
				<div class="form-group">
					<input class='form-control' type="text" name="no_seri_komponen" placeholder="No Komponen">
				</div>
				<div class="form-group">
					<input class='form-control' type="text" name="nama_komponen" placeholder="Nama Komponen">
				</div>
				<div class="form-group">
					<input class='form-control' type="text" name="supplier" placeholder="Supplier">
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-6">
							<input class='form-control' type="text" name="harga" placeholder="Harga">
						</div>
						<div class="col-md-6">
							<select class="form-control" id="currency" name="currency"> 
								<option>IDR</option>
								<option>USD</option> 
								<option>CNY</option> 
								<option>SGD</option>
							</select> 
						</div>
					</div>
				</div>
				<div class="form-group">
					<input class='form-control' type="text" name="jumlah" placeholder="Jumlah">
				</div>
				<div class="form-group">
					<input class='form-control' type="text" name="lokasi" placeholder="Lokasi">
				</div>
				<div class="form-group">
					<input class='form-control' type="text" name="keterangan" placeholder="Keterangan (Optional)">
				</div>
				<div class="form-group">
					<input class='form-control' type="text" name="min_jumlah" placeholder="Jumlah Stok Minimal">
				</div>
				<div class="form-group">
					<button id="btnSub"  class="btn btn-primary" role="button"> Tambah Barang Baru </button>
				</div>
			</form>
	      </div>
	    </div>

	  </div>
	</div>
{{-- end modal --}}

<fontsmall>	
	<br>
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
      	</form><br><br>
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
							<a href="update-stock/{{$data->id}}"><button id="updateStock" class="btn btn-primary" role="button" title="Ubah data barang">Update</button></a> 
							<a href="tambah-stock/{{$data->id}}"><button id="tambahStok" class="btn btn-warning " role="button" title="Tambah jumlah stok">+</button></a>
							<a href="delete-stock/{{$data->id}}"><button onclick="return confirm('Are you sure?')" id="deleteStok" class="btn btn-danger " role="button" title="Hapus barang">x</button></a>
						</td> 
					</tr>
				@endforeach
			</tbody> 
		</table>
		<br>
</fontsmall>

<div class="col-md-5 col-md-offset-5">
	<?php echo $datas->render(); ?>
</div>
@endsection