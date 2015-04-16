@extends('page-admin')

@section('content')
{{-- modal --}}
		<a href="#tambahBarangRusak"><button id="addBarangRusak" class="btn " role="button"> Tambah Barang Rusak</button></a>

		<div id="tambahBarangRusak" class="modalDialog">
			<div>
				<a href="#close" title="Close" class="close">X</a>
				<h2>Tambah Barang Rusak</h2>
				<form method="post" action="/admin/barang-masuk" >
					<input name="_token" hidden value="{!! csrf_token() !!}" />
					<input class='form-control' type="text" name="nama_perusahaan" placeholder="Nama Perusahaan">
					<input class='form-control' type="text" name="nama_barang_rusak" placeholder="Nama Barang Rusak">
					<input class='form-control' type="text" name="no_seri_barang_rusak" placeholder="No seri">
					<input class='form-control' type="text" name="no_surat_jalan" placeholder="No Surat Jalan">
					<br>
					<button id="btnSub"  class="btn" role="button"> Tambah Barang Baru </button>
				</form>
			</div>
		</div>
{{-- end modal --}}
	<div class="row">
		<table class="table table-hover table-responsive" id="tblData"> 
			<caption><h2>Barang Rusak</h2></caption>
			<thead>
				<tr>
					<th>Nama Barang</th> 
					<th>No Seri</th> 
					<th>Customer</th>
					<th>No Surat Jalan</th>
					<th>Tgl Datang</th> 
					<th>Biaya Jasa</th> 
					<th>Status</th> 
					<th>Tgl Diperbaiki</th> 
					<th>Tgl Selesai</th> 
					<th>Teknisi</th> 
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($barang_rusak as $barang)
				<tr>
		            <td>{{$barang->nama_barang_rusak}}</td>
		            <td>{{$barang->no_seri_barang_rusak}}</td>
		            <td>{{$barang->nama_perusahaan}}</td>
		            <td>{{$barang->no_surat_jalan}}</td>
		            <td>{{$barang->tgl_datang}}</td>
		            <td>{{$barang->harga_jasa}}</td>
		            <td>{{$barang->status}}</td>
		            <td>{{$barang->tgl_diperbaiki}}</td>
		            <td>{{$barang->tgl_selesai}}</td>
		            <td>{{$barang->username}}</td>
	            </tr>
	            @endforeach
			</tbody>
		</table>
	</div>
@endsection