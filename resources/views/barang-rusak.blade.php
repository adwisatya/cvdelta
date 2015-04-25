@extends('page-admin')

@section('content')
{{-- modal --}}
		<a href="#tambahBarangRusak"><button id="addBarangRusak" class="btn " role="button"> Tambah Barang Rusak</button></a>

		<div id="tambahBarangRusak" class="modalDialog">
			<div>
				<a href="#close" title="Close" class="close">X</a>
				<h3>Tambah Barang Rusak</h3>
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
{{-- modal --}}

		<div id="perbaiki" class="modalDialog">
			<div>
				<a href="#close" title="Close" class="close">X</a>
				<h3>Perbaiki Barang</h3>
				<form method="post" action="/admin/barang-masuk/perbaiki" >
					<input name="_token" hidden value="{!! csrf_token() !!}" />
					<input class='form-control' type="hidden" id="noseri" name="noseri">
					<select name="nama_teknisi" class="btn btn-default dropdown-toggle">
							<option disabled selected> -- Pilih nama Teknisi -- </option>
						@foreach($teknisi as $tek)
							<option>{{$tek->username}}</option>
						@endforeach
					</select>
					{{--<input class='form-control' type="text" name="nama_teknisi" placeholder="Nama Teknisi">--}}
					<br><br>
					<button id="btnSub"  class="btn btn-primary btn-group-sm" role="button"> Simpan </button>
				</form>
			</div>
		</div>

		<form method="post" id="form_selesai" action="/admin/barang-masuk/selesai" >
			<input name="_token" hidden value="{!! csrf_token() !!}" />
			<input class='form-control' type="hidden" id="idbarang" name="idbarang">
    	</form>
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
		            <td id="{{$barang->no_seri_barang_rusak}}">@if($barang->tgl_selesai=="")
		            		<button form="form_selesai" class="btn selesai" role="button"> selesai</button>
		            	@else
		            		{{$barang->tgl_selesai}}
		            	@endif
		            	
		            </td>
		            <td id="{{$barang->no_seri_barang_rusak}}">@if($barang->username=="")
		            		<a href="#perbaiki"><button class="btn pilihTeknisi" role="button"> Pilih</button></a>
		            	@else
		            		{{$barang->username}}
		            	@endif
		            	
		            </td>
	            </tr>
	            @endforeach
			</tbody>
		</table>
	</div>
@endsection