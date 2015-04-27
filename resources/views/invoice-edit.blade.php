@extends('page-admin')
@section('content')

<form id="invoice" method="post" action="create-pdf">
	<input name="_token" hidden value="{!! csrf_token() !!}" />
	<table style="width:100%;">
		<tr>
			<td style="width:20%;">Nama perusahaan:</td>
			<td><input style="width:40%;" class='form-control' type="text" name="nama_komponen" value="{{$nama_perus}} " readonly ></td>
		</tr>
	</table>	
</form>
	<?php $i = 0; ?>
	@foreach($barang_rusak as $barang)
	<!-- diulang dari sini -->
	<div class="invoiceBarang">
		<namabarang>{{$barang->no_seri_barang_rusak}}</namabarang>
		<div class="komponen">
			<table style="width:70%;">
				<tr>
					<td colspan="5">Jasa perbaikan</td>						
					<td><div class="input-group input-group-sm">
						  <span class="input-group-addon" id="basic-addon1">Rp. </span>
						  <input  name="biayaJasa" type="text" class="form-control" placeholder="Biaya Perbaikan" aria-describedby="basic-addon1">
						  <span class="input-group-addon">.00</span>
						</div></td>
				</tr>
				@for($j=0;$j<sizeof($komponens[$i]);$j++)
					<tr>
						<td style="width:2%;"><input onchange="calculate()" class="form-control" id="jml" value="{{$komponens[$i][$j]['jumlah']}}"></td>
						<td style="width:1%;">pcs</td>
						<td style="width:10%;" class="komp">{{$komponens[$i][$j]['no_seri_komponen']}}</td>
						<td style="width:1%;">@</td>
						<td style="width:8%;"><div class="input-group input-group-sm">
						  <span class="input-group-addon" id="basic-addon1">Rp. </span>
						  <input onchange="calculate()" id="hargaKomponen" name="hargaKomponen" type="text" class="form-control" aria-describedby="basic-addon1" value="{{$komponens[$i][$j]['harga'][0]->harga}}"></input>
						  <span class="input-group-addon">.00</span>
						</div></td>
						<td style="width:10%;"><input id="total" value="{{$komponens[$i][$j]['subtotal']}}" class="form-control" readonly></td>
					</tr>
				@endfor
				<tr>
					<td colspan="5"><b>Subtotal</b></td>
					<td><b><input class="form-input" id="subtotal" value"" readonly >Rp. <?php echo array_sum(array_column($komponens[$i],'subtotal')) ?>,00</b></td>
				</tr>
			</table>
		</div>
	</div>
	<?php $i++; ?>
	<!-- diulang sampe sini -->
	<hr>
	@endforeach
	<div class="sign">
		
		Bandung, April 2015
		<br><br><br><br><br>
		Sonny Tjahjadi
	</div>

<script>
function calculate() {
    var x = document.getElementById("hargaKomponen").value;
    document.getElementById("total").value = x*(document.getElementById("jml").value);
}
</script>
@endsection