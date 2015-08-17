@extends('page-admin')

@section('content')
	@foreach($cust as $customer)

	<form id="updateCustomer" method="post" action="/admin/updateStock">
		<input name="_token" hidden value="{!! csrf_token() !!}" />
		<table style="width:100%;">
			<input name="id" type="hidden" value="{{$komp->id}}">
			<tr>	
				<td style="width:15%;">No Komponen</td>
				<td><input class='form-control' type="text" name="noSeri" value="{{$komp->no_seri_komponen}}" readonly ></td>
			</tr>
			<tr>
				<td>Nama Komponen</td>
				<td><input class='form-control' type="text" name="namaKomponen" value="{{$komp->nama_komponen}}" ></td>
			</tr>
			<tr>
				<td>Lokasi</td>
				<td><input class='form-control' type="text" name="lokasi" value="{{$komp->lokasi}}"></td>
			</tr>
			<tr>
				<td>Supplier</td>
				<td><input class='form-control' type="text" name="supplier" value="{{$komp->supplier}}"></td>
			</tr>
			<tr>
				<td>Harga</td>
				<td><input class='form-control' type="hidden" name="harga" id="priceAndCurrency" value="{{$komp->harga}}">
				<div class="row">
					<div class="col-sm-9">
						<input class='form-control' onchange="editPrice()" type="text" name="harga-edit" id="new-price" value="<?php echo substr($komp->harga, 0, strpos($komp->harga, '-')); ?>">
					</div>
					<div class="col-sm-3">
						<select class='form-control' onchange="editPrice()" id="new-currency">
							<option value="IDR" <?php if (substr($komp->harga, strpos($komp->harga, "-") + 1) == "IDR") echo "selected"; ?>>Rupiah</option>
							<option value="USD" <?php if (substr($komp->harga, strpos($komp->harga, "-") + 1) == "USD") echo "selected"; ?>>USD</option>
							<option value="CNY" <?php if (substr($komp->harga, strpos($komp->harga, "-") + 1) == "CNY") echo "selected"; ?>>Chinese Yuan</option>
							<option value="SGD" <?php if (substr($komp->harga, strpos($komp->harga, "-") + 1) == "SGD") echo "selected"; ?>>Singapore Dollar</option>
						</select>
					</div>
				</div>
				</td>
			</tr>
			<tr>
				<td>Jumlah minimal</td>
				<td><input class='form-control' type="text" name="minJum" value="{{$komp->min_jumlah}}"></td>
			</tr>
			<tr>
				<td>Jumlah</td>
				<td><input class='form-control' type="text" name="jumlah" value="{{$komp->jumlah}}"readonly></td>
			</tr>
			<tr>
				<td>Keterangan</td>
				<td><input class='form-control' type="text" name="ket" value="{{$komp->keterangan}}"></td>
			</tr>				
		</table>
		<br>
		<button id="btnSub" form="updateStok" class="btn btn-primary" role="button" type="submit"> Update Stok </button>
	</form>	








		{{$customer->nama_perusahaan}}
	@endforeach
@endsection