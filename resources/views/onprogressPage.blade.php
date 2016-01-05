@extends('page-teknisi')

@section('content')
{{-- modal --}}

<div id="perbaiki" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Pilih Teknisi</h4>
      </div>
      <div class="modal-body">
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
  </div>
</div>

	<form onsubmit="return confirm('Apakah barang sudah selesai diperbaiki?');"  method="post" id="form_selesai" action="/admin/barang-masuk/selesai" >
		<input name="_token" hidden value="{!! csrf_token() !!}" />
		<input class='form-control' type="hidden" id="idbarang" name="idbarang">
	</form>

	<form onsubmit="return confirm('Barang tidak dapat diperbaiki?');" method="post" id="form_unrepairable" action="/teknisi/barang-masuk/unrepairable">
		<input name="_token" hidden value="{!! csrf_token() !!}" />
		<input type="hidden" id="idbarang-unrepairable" name="idbarang-unrepairable">
	</form>
{{-- end modal --}}
	<div class="row">
		<table class="table table-hover table-responsive" id="tblData"> 
			<caption><h2>Barang Perbaikan</h2></caption>
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
		            		<!-- <a href="#perbaiki"><button class="btn btn-primary pilihTeknisi" role="button"> Pilih</button></a> -->
							<button type="button" class="btn btn-primary pilihTeknisi" data-toggle="modal" data-target="#perbaiki">Pilih</button>
		            	@else
		            		{{$barang->username}}
		            	@endif		            	
		            </td>
		            <?php $userlogin = Session::get('username'); ?>
		            @if($barang->username=="$userlogin")
			            <td id="{{$barang->no_seri_barang_rusak}}">
			            	@if($barang->username!="")
			            		<button form="form_selesai" class="btn btn-success selesai" role="button" title="barang selesai diperbaiki"> Selesai</button>
			            		<!-- "{{Session::get('username')}}" -->
			            	@endif		            	
			            </td>
			            <td id="{{$barang->no_seri_barang_rusak}}">
			            	@if($barang->username!="")
			            		<button form="form_unrepairable" class="btn btn-danger unrepairable" title="barang tidak bisa diperbaiki" role="button" type="submit">X</button>
			            	@endif
			            </td>
			        @endif
	            </tr>
	            @endforeach
			</tbody>
		</table>
	</div>


@endsection

