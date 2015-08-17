<html>
<head>
<title>CV. Delta</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<link rel="stylesheet" href="{{url('css/style.css')}}" />
<link rel="stylesheet" href="{{ asset('/css/amaran.min.css') }}">
<script src="{{ asset('/js/jquery.amaran.min.js') }}"></script>
<script src="{{ asset('/js/printPDF.js') }}"></script>
<style>
body {background-color:white}
</style>
<style type="text/css">
@media print{
  body{ background-color:#FFFFFF; background-image:none; color:#000000 }
  #ad{ display:none;}
  #leftbar{ display:none;}
  #contentarea{ width:100%;}
}
</style>
</head>
<body>
	<!-- <a href="{{ url('admin/pilih-customer/pdf', $nama_perus, $barang_rusak) }}"<button id="btnSub"  class="btn" role="button"> pdf</button></a> -->
	<div class="kop">
		<a><img src="{{url('images/logo_biru.png')}}" class="images"><br></a>
		Taman Kopo Indah II 1A no. 10 Bandung <br>
		Telp/fax (022) 5415768
		<hr>
	</div>

	<div class="invoiceHeader">
		No Tagihan: <input class="col-medium" value="" placeholder="no tagihan"></input></td>
		<br><br>
		Kepada Yth. <br>
		{{$nama_perus}} <br>
		<br><br><br><br>
		Perincian Biaya Perbaikan PCB, sebagai berikut:
	</div>
	
	<?php $i = 0; ?>
	@foreach($barang_rusak as $barang)
	<!-- diulang dari sini -->
	<div class="invoiceBarang">
		<div class="namabarang"><?php echo substr($barang->no_seri_barang_rusak, 0, strpos($barang->no_seri_barang_rusak, '|'));?></div>
		<div class="komponen">
			<input name="_token" hidden value="{!! csrf_token() !!}" />
			<table>
				<tr>
					<td colspan="6">Jasa perbaikan</td>
					<td>Rp</td>						
					<td>
						@if($barang->recheck)
							<input onchange="calculateJasa({{$i}})" name="biayaJasa" id="biayaJasa{{$i}}" type="text" class="form-control col-medium harga" placeholder="Biaya Perbaikan" value=0 aria-describedby="basic-addon1" readonly></td>
						@else
							<input onchange="calculateJasa({{$i}})" name="biayaJasa" id="biayaJasa{{$i}}" type="text" class="form-control col-medium harga" placeholder="Biaya Perbaikan" aria-describedby="basic-addon1"></td>
						@endif
				</tr>
				@for($j=0;$j<sizeof($komponens[$i]);$j++)
					<tr>
						<td><input onchange="calculatePerKomponen({{$i}},{{$j}})" class="form-control unborder col-kecil" id="jml{{$i}}-{{$j}}" value="{{$komponens[$i][$j]['jumlah']}}"></td>
						<td><input class="col-kecil" value="pcs"></input></td>
						<td><input class="col-medium" value="{{$komponens[$i][$j]['no_seri_komponen']}}"></input></td>
						<td>@</td>
						<td>Rp</td>
						<td><input onchange="calculatePerKomponen({{$i}},{{$j}})" id="hargaKomponen{{$i}}-{{$j}}" name="hargaKomponen" type="text" class="form-control col-medium" aria-describedby="basic-addon1" value="{{$komponens[$i][$j]['harga']}}"></input></td>
						<td>Rp</td>
						<td><input id="total{{$i}}-{{$j}}" value="{{$komponens[$i][$j]['subtotal']}}" class="form-control col-medium" readonly></td>
					</tr>
				@endfor
				<tr>
					<td colspan="4"> 
					<td colspan="2"><b>Subtotal</b></td>
					<td style="font-weight: bold;">Rp </td>
					<td><input id="subtotal{{$i}}" style="font-weight: bold; font-size: 16px" name="subtotal" type="text" class="form-control col-medium subtotal-barang-rusak" aria-describedby="basic-addon1" readonly value="<?php echo array_sum(array_column($komponens[$i],'subtotal')) ?>"></input></td>
						<!-- subtotal original untuk bantu perhitungan sama javascriptnya -->
						<td><input id="subtotal-original{{$i}}" style="font-weight: bold; font-size: 16px" name="subtotal" type="hidden" class="form-control col-medium" aria-describedby="basic-addon1" readonly value="<?php echo array_sum(array_column($komponens[$i],'subtotal')) ?>"></input></td>
					<script>
					// 	function calculateJasa(i){
					// 	var sub = parseInt(document.getElementById("subtotal"+i).value);
					// 	var jasa = parseInt(document.getElementById("biayaJasa"+i).value);
					// 	// var temp = parseInt(document.getElementById("subtotal"+i).value); 
					//     document.getElementById("subtotal"+i).value = jasa+<?php echo array_sum(array_column($komponens[$i],'subtotal')) ?>;
					// }
					</script>
				</tr>
			</table>
		</div>
	</div>
	<?php $i++; ?>
	<!-- diulang sampe sini -->

	@endforeach
	
	<div class="sign">
		Bandung, <?php echo date("d/m/Y"); ?> 
		<br><br><br><br><br>
		Sonny Tjahjadi
	</div>
	


	<script>
		function calculatePerKomponen(i,j) {
			// window.alert(i+","+j);
			var sub = parseInt(document.getElementById("subtotal"+i).value);
			var temp_total = sub - document.getElementById("total"+i+"-"+j).value;
			// var subtotal = document.getElementById("subtotal"+i).value;
		    var x = document.getElementById("hargaKomponen"+i+"-"+j).value;
		    document.getElementById("total"+i+"-"+j).value = x*(document.getElementById("jml"+i+"-"+j).value);
		    document.getElementById("subtotal"+i).value = temp_total+parseInt(document.getElementById("total"+i+"-"+j).value);
		}
		function calculateJasa(i){
			var sub = parseInt(document.getElementById("subtotal-original"+i).value);
			var jasa = parseInt(document.getElementById("biayaJasa"+i).value);
		    document.getElementById("subtotal"+i).value = jasa+sub;
		}

		function calculateGrandTotal(){
			$('.subtotal-barang-rusak').each(function(){
				// grandTotal =+ parseInt(document.getElementsByClass(".subtotal-barang-rusak").value);
				// alert(grandTotal);
			});
		}
	</script>

</body>
</html>