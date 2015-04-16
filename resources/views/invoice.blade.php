<html>
<head>
<title>CV. Delta</title>
<link rel="stylesheet" href="{{url('css/style.css')}}" />
<style>
body {background-color:white}
</style>
</head>
<body>
	<div class="kop">
		<img src="{{url('images/logo_biru.png')}}"><br>
		Taman Kopo Indah II 1A no. 10 Bandung <br>
		Telp/fax (022) 5415768
		<hr>
	</div>
	<div class="invoiceHeader">
		Yth. bapak siapa <br>
		di tempat <br>
		lalala <br><br><br><br>
		Berikut ini adalah Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	</div>
	<?php $i = 0; ?>
	@foreach($barang_rusak as $barang)
	<!-- diulang dari sini -->
	<div class="invoiceBarang">
		<namabarang>{{$barang->no_seri_barang_rusak}}</namabarang>
		<div class="komponen">
			<table>
				<tr>
					<td colspan="5">Jasa perbaikan</td>
					<td>harga</td>
				</tr>
					@for($j=0;$j<sizeof($komponens[$i]);$j++)
						<tr>
							<td>{{$komponens[$i][$j]['jumlah']}}</td>
							<td>pcs</td>
							<td class="komp">{{$komponens[$i][$j]['no_seri_komponen']}}</td>
							<td>@</td>
							<td>Rp. {{$komponens[$i][$j]['harga'][0]->harga}},00</td>
							<td>Rp. {{$komponens[$i][$j]['subtotal']}},00</td>
						</tr>
					@endfor
				<tr>
					<td colspan="5"><b>Subtotal</b></td>
					<td>Rp. <?php echo array_sum(array_column($komponens[$i],'subtotal')) ?>,00</td>
				</tr>
			</table>
		</div>
	</div>
	<?php $i++; ?>
	<!-- diulang sampe sini -->
	@endforeach
	<div class="sign">
		Bandung, Bulan tahun
		<br><br><br><br><br>
		Sonny Tjahjadi
	</div>


</body>
</html>