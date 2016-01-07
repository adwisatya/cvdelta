@extends('page-admin')

@section('pagetitle')
	History Barang Perbaikan
@endsection	

@section('content')
	<div class="row">
		<div class="col-sm-4 pull-right">
			<div class="pull-right">
				<input id="historySearch" class="form-control" placeholder="cari..." ></input>
				<select class="form-control" id="historySortBy">
					<option disabled selected>--- Urutkan berdasarkan ---</option>
					<option value="customer">Customer</a></option>
					<option value="tgldatang">Tanggal datang</option>
					<option value="tglselesai">Tanggal selesai</option>
					<option value="teknisi">Teknisi</option>
					<option value="status">Status</option>
				</select>
			</div>
		</div>
	</div>
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
					<th>Tgl Selesai</th> 
					<th>Teknisi</th> 
					<!-- <th></th>  -->
					<!-- <th></th> -->
				</tr>
			</thead>
			<tbody>
				@foreach($barang_rusak as $barang)
				<tr>
		            <td>{{$barang->nama_barang_rusak}}</td>
		            <!-- <td>{{$barang->no_seri_barang_rusak}}</td> -->
		            <td><?php echo substr($barang->no_seri_barang_rusak, 0, strpos($barang->no_seri_barang_rusak, '|'));?></td>
		            <td>{{$barang->nama_perusahaan}}</td>
		            <td>{{$barang->no_surat_jalan}}</td>
		            <td>{{$barang->tgl_datang}}</td>
		            <td>{{$barang->status}}</td>
		            <td>{{$barang->tgl_diperbaiki}}</td>
		            <td>{{$barang->tgl_selesai}}</td>
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

	<script type="text/javascript">
		$("#historySortBy").change(function(){
			$sortOption = $("#historySortBy").val();
			if($sortOption == "customer"){
				window.location.replace("/admin/barang-selesai/viewbyCustomer");
			}
			else if($sortOption == "tgldatang"){
				window.location.replace("/admin/barang-selesai/viewbyTglDatang");
			}
			else if($sortOption == "tglselesai"){
				window.location.replace("/admin/barang-selesai/viewbyTglSelesai");
			}
			else if($sortOption == "teknisi"){
				window.location.replace("/admin/barang-selesai/viewbyTeknisi");
			}
			else if($sortOption == "status"){
				window.location.replace("/admin/barang-selesai/viewbyStatus");
			}
		});

		// search on top
		$("#historySearch").keyup(function(event){
		    if(event.keyCode == 13){
		    	$searchQuery = $("#historySearch").val();
		    	if($searchQuery == ""){
					window.location.replace("/admin/barang-selesai/view");	
		    	}
		    	else{			    	
					window.location.replace("/admin/barang-selesai/viewbySearch/"+$searchQuery);	
		    	}
		    }
		});
	</script>
@endsection