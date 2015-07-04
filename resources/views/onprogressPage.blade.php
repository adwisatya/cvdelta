@extends('page-teknisi')

@section('content')
{{-- modal --}}
	<div id="perbaiki" class="modalDialog">
		<div>
			<a href="#close" title="Close" class="close">X</a>
			<h3>Perbaiki Barang</h3>
			<form method="post" action="/pilihBarangRusak" >
				<input name="_token" hidden value="{!! csrf_token() !!}" />
				<input class='form-control' type="hidden" id="noseri" name="noseri">
				<select name="nama_teknisi" class="btn btn-default dropdown-toggle">
						<!-- <option disabled selected> -- Pilih nama Teknisi -- </option> -->
						<option><?php echo Session::get('username') ?></option>
					<!-- @foreach($teknisi as $tek)
						<option>{{$tek->username}}</option>
					@endforeach -->
				</select>
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
					<th>Tgl Datang</th> 
					<th>Status</th> 
					<th>Recheck</th> 
					<th>Tgl Diperbaiki</th> 
					<th>Teknisi</th> 
					<th></th> 
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($barangrusak as $barang)
				<tr>
		            <td>{{$barang->nama_barang_rusak}}</td>
		            <td><?php echo substr($barang->no_seri_barang_rusak, 0, strpos($barang->no_seri_barang_rusak, '|'));?></td>
		            <td>{{$barang->nama_perusahaan}}</td>
		            <td>{{$barang->tgl_datang}}</td>
		            <td>{{$barang->status}}</td>
		            <td>
		            	@if($barang->recheck)
		            		<red>recheck</red>
		            	@else
		            		-
		            	@endif
		            </td>
		            <td>{{$barang->tgl_diperbaiki}}</td>
		           	<td id="{{$barang->no_seri_barang_rusak}}">@if($barang->username=="")
		            		<a href="#perbaiki"><button class="btn btn-primary pilihTeknisi" role="button"> Pilih</button></a>
		            	@else
		            		{{$barang->username}}
		            	@endif		            	
		            </td>
		            <td id="{{$barang->no_seri_barang_rusak}}">@if($barang->username=="")
		            		
		            	@else
		            		<button form="form_selesai" class="btn btn-success selesai" role="button"> selesai</button>
		            	@endif		            	
		            </td>
		          <!--    <td id="{{$barang->no_seri_barang_rusak}}">@if($barang->tgl_selesai=="")
		            		<button form="form_selesai" class="btn btn-success selesai" role="button"> selesai</button>
		            	@else
		            		{{$barang->tgl_selesai}}
		            	@endif
		            	
		            </td> -->
	            </tr>
	            @endforeach
			</tbody>
		</table>
	</div>
@endsection