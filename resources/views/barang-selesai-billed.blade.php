@extends('page-admin')

@section('pagetitle')
	History Barang Perbaikan
@endsection	

@section('content')
	<div class="row">
		<table class="table table-hover table-responsive" id="tblData"> 
			<thead>
				<tr>
					<th>Nama Barang</th> 
					<th>No Seri</th> 
					<th>Customer</th>
					<th>No Surat Jalan</th>
					<th>Tgl Datang</th> 
					<th>Status</th> 
					<th>Tgl Diperbaiki</th> 
					<th>Teknisi</th> 
					<th></th> 
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
		            <td>{{$barang->status}}</td>
		            <td>{{$barang->tgl_diperbaiki}}</td>
		           	<td id="{{$barang->no_seri_barang_rusak}}">@if($barang->username=="")
		            		<!-- <a href="#perbaiki"><button class="btn btn-primary pilihTeknisi" role="button"> Pilih</button></a> -->
		            		-
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