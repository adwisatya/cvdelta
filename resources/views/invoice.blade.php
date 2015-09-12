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
input{border:none;}
</style>
<style type="text/css">
@media print{
  body{ background-color:#FFFFFF; background-image:none; color:#000000 }
  #ad{ display:none;}
  #leftbar{ display:none;}
  #contentarea{ width:100%;}
  input{
  	border:none;
  }
}
</style>
</head>
<body>
	<div class="print-preview-button no-print">
		<button>print preview</button>
	</div>
	<div class="print-button no-print">
		<button>print</button>
	</div>
	<!-- <a href="{{ url('admin/pilih-customer/pdf', $nama_perus, $barang_rusak) }}"<button id="btnSub"  class="btn" role="button"> pdf</button></a> -->
	<div class="kop">
		<a><img src="{{url('images/logo_biru.png')}}" class="images logo-img"><br></a>
		Taman Kopo Indah II 1A no. 10 Bandung <br>
		Telp/fax (022) 5415768
		<hr>
	</div>

	<div class="invoiceHeader">
		No Tagihan: <input class="col-medium" value="" placeholder="no tagihan" id="no_tagihan"></input></td>
		<br><br>
		Kepada Yth. <br>
		{{$nama_perus}} <br>
		<br><br><br>
		Perincian Biaya Perbaikan PCB, sebagai berikut:
	</div>
	
	<?php $i = 0; ?>
	@foreach($barang_rusak as $barang)
	<!-- diulang dari sini -->
	<div class="invoiceBarang">
		<div class="namabarang_full hidden">{{$barang->no_seri_barang_rusak}}</div>
		<div class="namabarang">{{$barang->nama_barang_rusak}} &nbsp;&nbsp;&nbsp;<normal-text class="font--small">sn: <?php echo substr($barang->no_seri_barang_rusak, 0, strpos($barang->no_seri_barang_rusak, '|'));?> &nbsp;&nbsp;&nbsp;sj: {{$barang->no_surat_jalan}}</normal-text></div>
		<div class="komponen">
			<input name="_token" hidden value="{!! csrf_token() !!}" />
			<table>
				<tr>
					<td colspan="6">Jasa perbaikan</td>
					<td>Rp</td>						
					<td>
						@if($barang->recheck)
							<input name="biayaJasa" id="biayaJasa{{$i}}" type="text" class="form-control col-medium harga" placeholder="Biaya Perbaikan" value=0 aria-describedby="basic-addon1" readonly></td>
						@else
							<input onchange="calculateAll({{$i}})" name="biayaJasa" id="biayaJasa{{$i}}" type="text" class="form-control col-medium harga numseparator" placeholder="Biaya Perbaikan" aria-describedby="basic-addon1"></td>
						@endif
				</tr>
				@for($j=0;$j<sizeof($komponens[$i]);$j++)
					<tr>
						<td><input onchange="calculateTotalPerKomponen({{$i}},{{$j}})" class="form-control unborder col-kecil" id="jml{{$i}}-{{$j}}" value="{{$komponens[$i][$j]['jumlah']}}"></td>
						<td><input class="col-kecil" value="pcs"></input></td>
						<td><input class="col-medium numseparator" value="{{$komponens[$i][$j]['no_seri_komponen']}}"></input></td>
						<td>@</td>
						<td>Rp</td>
						<td><input onchange="calculateTotalPerKomponen({{$i}},{{$j}})" id="hargaKomponen{{$i}}-{{$j}}" name="hargaKomponen" type="text" class="form-control col-medium numseparator" aria-describedby="basic-addon1" value="{{$komponens[$i][$j]['harga']}}"></input></td>
						<td>Rp</td>
						<td><input id="total{{$i}}-{{$j}}" value="{{$komponens[$i][$j]['subtotal']}}" class="form-control col-medium subtotalPerComponent numseparator" readonly></td>
					</tr>
				@endfor
				<tr>
					<td colspan="4"> 
					<td colspan="2"><b>Subtotal</b></td>
					<td style="font-weight: bold;">Rp </td>
					<td><input id="subtotal{{$i}}" style="font-weight: bold; font-size: 16px" name="subtotal" type="text" class="form-control col-medium subtotal-barang-rusak numseparator" aria-describedby="basic-addon1" readonly value="<?php echo array_sum(array_column($komponens[$i],'subtotal')) ?>"></input></td>
						<!-- subtotal original untuk bantu perhitungan sama javascriptnya -->
						<!-- <td><input id="subtotal-original{{$i}}" style="font-weight: bold; font-size: 16px" name="subtotal" type="hidden" class="form-control col-medium" aria-describedby="basic-addon1" readonly value="<?php echo array_sum(array_column($komponens[$i],'subtotal')) ?>"></input></td> -->
				</tr>
			</table>
		</div>
	</div>
	<?php $i++; ?>
	<!-- diulang sampe sini -->

	@endforeach
	<br><br>
	<h4>Total Pembayaran
	<br>
	Rp <input id="grandtotal" class="invoice-input--large numseparator" value="-" readonly></input></h3>
	
	<div class="sign">
		Bandung, <?php echo date("d/m/Y"); ?> 
		<br><br><br><br><br>
		Sonny Tjahjadi
	</div>
	
<script type="text/javascript">
	$(window).load(function(){
		// calculateAll(i);
		calculateGrandTotal();
	});

	function calculateTotalPerKomponen(i,j){
		delNumSeparator();
		var sub = parseInt(document.getElementById("subtotal"+i).value);
		var temp_total = sub - document.getElementById("total"+i+"-"+j).value;
	    var x = document.getElementById("hargaKomponen"+i+"-"+j).value;
	    document.getElementById("total"+i+"-"+j).value = x*(document.getElementById("jml"+i+"-"+j).value);
	    document.getElementById("subtotal"+i).value = temp_total+parseInt(document.getElementById("total"+i+"-"+j).value);
		calculateGrandTotal();
		addNumSeparator();
	}
	function calculateAll(i){
		delNumSeparator();
		calculateSubTotal(i);
		calculateGrandTotal();
		addNumSeparator();
	}
	function calculateSubTotal(i){
		var temp_total_per_komponen = 0; 
		$('[id^=total'+i+']').each(function(){
			temp_total_per_komponen = temp_total_per_komponen + parseInt($(this).val()); 
		});

		temp_total_per_komponen = parseInt(document.getElementById("biayaJasa"+i).value) + temp_total_per_komponen;
		document.getElementById("subtotal"+i).value = temp_total_per_komponen;
	}
	function calculateGrandTotal(){
		var grandTotalTemp = 0;
		$('.subtotal-barang-rusak').each(function(){
			if($(this).val().length!=0){
				grandTotalTemp = grandTotalTemp + parseInt($(this).val()); 
			}
		});
		$('#grandtotal').val(grandTotalTemp);
	}
	function addNumSeparator(){
		delNumSeparator();
		$('.numseparator').each(function(){
			var price = $(this).val();
			if(price.length > 6){
				var slice1 = price.slice(-3);
				var slice2 = price.slice(-6,-3);
				var sisa = price.slice(0,-6);				
				$(this).val(sisa+"."+slice2+"."+slice1);
			}
			else if(price.length > 3 && price.length < 7 ){
				var slice1 = price.slice(-3);
				var sisa = price.slice(0,-3);				
				$(this).val(sisa+"."+slice1);
			}
		});
	}
	function delNumSeparator(){
		$('.numseparator').each(function(){
			$(this).val($(this).val().replace('.',''));
			$(this).val($(this).val().replace('.',''));
		});
	}

	
</script>
	


</body>
</html>