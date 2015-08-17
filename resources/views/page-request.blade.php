@extends('page-admin')

@section('content')
<?php use App\database; ?>
	<div class="row">
		<form method="post" id="form_data" action="/admin/request/approval" >
			<input name="_token" hidden value="{!! csrf_token() !!}" />
			<input class='form-control' type="hidden" id="noserikomponen" name="noserikomponen">
			<input class='form-control' type="hidden" id="jumlahkomponen" name="jumlahkomponen">
			<input class='form-control' type="hidden" id="stokkomponen" name="stokkomponen">
			<input class='form-control' type="hidden" id="noseribarangrusak" name="noseribarangrusak">
			<input class='form-control' type="hidden" id="username" name="username">
			<input class='form-control' type="hidden" id="tombol" name="tombol">
			<input class='form-control' type="hidden" id="supplier" name="supplier">
		</form>
		<table class="table table-hover table-responsive"> 
			<caption><h2>Permintaan Komponen</h2></caption>
			<thead> 
				<tr> 
					<th>No Seri Komponen</th> 
					<th>Nama Komponen</th> 
					<th>Jumlah</th>
					<th>Stok</th>
					<th>Barang Terkait</th>
					<th>Teknisi</th>
					<th>Supplier</th>
					<th>Approve</th>
				</tr> 
			</thead> 
			<tbody>
				@foreach ($datas as $data)
					<tr>
						<td class="nokomponen">{{$data['no_seri_komponen']}}</td>
						<td class="namakomponen">{{$data['nama_komponen']}}</td>
						<td class="jumlah">{{$data['jumlah']}}</td>
						<td class="stok">{{$data['min']}}</td>
						<td class="nobarang"><?php echo substr($data['no_seri_barang_rusak'], 0, strpos($data['no_seri_barang_rusak'], '|'));?></td>

						<td class="user">{{$data['username']}}</td>
						<td class="supplier">
							<select form="form_data" class="form-control">
								<?php $komponens = database::getSuppliersByNoSeriKomp($data['no_seri_komponen']);
									foreach($komponens as $komponen){
										echo "<option value=$komponen->supplier>$komponen->supplier</option>";
									}
								?>
							</select>							
						</td>
						<td>
							<button form="form_data" class="btn btn-success approve" role="button"> Approve</button>
							<button form="form_data" class="btn btn-danger decline" role="button"> Decline </button>
						</td>
					</tr>
				@endforeach
			</tbody> 
		</table><br>	
	</div>
	
@endsection

@section('scripts')
	<script type="text/javascript">
		window.onload = setupRefresh;

		function setupRefresh() {
		  setTimeout("refreshPage();", 10000);
		}
		function refreshPage() {
		   window.location = location.href;
		}
	</script>
@endsection