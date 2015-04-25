@extends('page-admin')

@section('content')

{{-- modal --}}
		<a href="#tambahStok"><button id="addStock" class="btn btn-primary " role="button"> Tambah Stok</button></a>

		<div id="tambahStok" class="modalDialog">
			<div>
				<a href="#close" title="Close" class="close">X</a>
				<h2>Tambah Stok</h2>
				<form method="post" action="/admin/stock" >
					@include ('errors.validate')
					<input name="_token" hidden value="{!! csrf_token() !!}" />
					<input class='form-control' type="text" name="nama_komponen" placeholder="Nama Komponen">
					<input class='form-control' type="text" name="no_seri_komponen" placeholder="No Komponen">
					<input class='form-control' type="text" name="jumlah" placeholder="Jumlah">
					<br>
					<button id="btnSub" class="btn btn-primary" role="button"> Tambah Stok </button>
				</form>
			</div>
		</div>
{{-- end modal --}}
	
	{{-- modal --}}
		<a href="#tambahStokBaru"><button id="addNewStock" class="btn btn-primary" role="button"> Tambah Stok Baru</button></a>

		<div id="tambahStokBaru" class="modalDialog">
			<div>
				<a href="#close" title="Close" class="close">X</a>
				<h2>Tambah Stok Baru</h2>
				<form method="post" action="/admin/stock-baru" >
					<input name="_token" hidden value="{!! csrf_token() !!}" />
					<input class='form-control' type="text" name="nama_komponen" placeholder="Nama Komponen">
					<input class='form-control' type="text" name="no_seri_komponen" placeholder="No Komponen">
					<input class='form-control' type="text" name="supplier" placeholder="Supplier">
					<input class='form-control' type="text" name="harga" placeholder="Harga">
					<input class='form-control' type="text" name="jumlah" placeholder="Jumlah">
					<input class='form-control' type="text" name="lokasi" placeholder="Lokasi">
					<input class='form-control' type="text" name="keterangan" placeholder="Keterangan">
					<input class='form-control' type="text" name="min_jumlah" placeholder="Jumlah Stok Minimal">
					<br>
					<button id="btnSub"  class="btn btn-primary" role="button"> Tambah Barang Baru </button>
				</form>
			</div>
		</div>
{{-- end modal --}}

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