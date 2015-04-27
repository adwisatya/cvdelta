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

<fontsmall>	
	<div class="row">
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
						<td>Rp. {{$data->harga}},00</td>
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
@endsection