@extends('page-admin')
@section('content')

<div class="printButton">
	<button class="btn btn-primary">print</button>
</div>

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
						  <input onchange="calculateJasa({{$i}},<?php echo array_sum(array_column($komponens[$i],'subtotal')) ?>)" name="biayaJasa" id="biayaJasa{{$i}}" type="text" class="form-control" placeholder="Biaya Perbaikan" aria-describedby="basic-addon1">
						  <span class="input-group-addon">.00</span>
						</div></td>
				</tr>
				@for($j=0;$j<sizeof($komponens[$i]);$j++)
					<tr>
						<td style="width:2%;"><input onchange="calculatePerKomponen({{$i}},{{$j}},<?php echo array_sum(array_column($komponens[$i],'subtotal')) ?>)" class="form-control" id="jml{{$i}}-{{$j}}" value="{{$komponens[$i][$j]['jumlah']}}"></td>
						<td style="width:1%;">pcs</td>
						<td style="width:10%;" class="komp">{{$komponens[$i][$j]['no_seri_komponen']}}</td>
						<td style="width:1%;">@</td>
						<td style="width:8%;"><div class="input-group input-group-sm">
						  <span class="input-group-addon" id="basic-addon1">Rp. </span>
						  <input onchange="calculatePerKomponen({{$i}},{{$j}},<?php echo array_sum(array_column($komponens[$i],'subtotal')) ?>)" id="hargaKomponen{{$i}}-{{$j}}" name="hargaKomponen" type="text" class="form-control" aria-describedby="basic-addon1" value="{{$komponens[$i][$j]['harga'][0]->harga}}"></input>
						  <span class="input-group-addon">.00</span>
						</div></td>
						<td style="width:10%;"><input id="total{{$i}}-{{$j}}" value="{{$komponens[$i][$j]['subtotal']}}" class="form-control" readonly></td>
					</tr>
				@endfor
				<tr>
					<td colspan="5"><b>Subtotal</b></td>
					<td style="width:8%;"><div class="input-group input-group-sm">
						  <span class="input-group-addon" id="basic-addon1">Rp. </span>
						  <input id="subtotal{{$i}}" name="subtotal" type="text" class="form-control" aria-describedby="basic-addon1" readonly value="<?php echo array_sum(array_column($komponens[$i],'subtotal')) ?>"></input>
						</div></td>
					<!-- <td><b><input class="form-input" id="subtotal" value"" readonly >Rp. <?php echo array_sum(array_column($komponens[$i],'subtotal')) ?>,00</b></td> -->
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
function calculatePerKomponen(i,j,sub) {
	// window.alert(i+","+j);
	var temp_total = sub - document.getElementById("total"+i+"-"+j).value;
	// var subtotal = document.getElementById("subtotal"+i).value;
    var x = document.getElementById("hargaKomponen"+i+"-"+j).value;
    document.getElementById("total"+i+"-"+j).value = x*(document.getElementById("jml"+i+"-"+j).value);
    document.getElementById("subtotal"+i).value = temp_total+parseInt(document.getElementById("total"+i+"-"+j).value);
    calculateSubTotal(i,j,sub);
}
function calculateJasa(i,sub){
	sub = parseInt(document.getElementById("subtotal"+i).value);
	var jasa = parseInt(document.getElementById("biayaJasa"+i).value);
	// var temp = parseInt(document.getElementById("subtotal"+i).value); 
    document.getElementById("subtotal"+i).value = jasa+sub;
}
function calculateSubTotal(i,j,sub){
	window.alert('here');	
}
</script>
@endsection