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
	<!-- diulang dari sini -->
	@foreach($barang_rusak as $barang)
	<div class="invoiceBarang">
		<namabarang>{{$barang->no_seri_barang_rusak}}</namabarang>
		<div class="komponen">
			<table>
				<tr>
					<td colspan="5">Jasa perbaikan</td>
					<td>harga</td>
				</tr>
				<!-- diulang dari sini -->
				
					<tr>
						<td>2</td>
						<td>pcs</td>
						<td class="komp">nama komponennya panjang banget jadinya gini</td>
						<td>@</td>
						<td>harga</td>
						<td>subtotal</td>
					</tr>
				<tr>
					<td>2</td>
					<td>pcs</td>
					<td class="komp">nama komponennya panjang banget jadinya gini</td>
					<td>@</td>
					<td>harga</td>
					<td>subtotal</td>
				</tr>
				<tr>
					<td>2</td>
					<td>sat</td>
					<td class="komp">nama komponennya </td>
					<td>@</td>
					<td>harga</td>
					<td>subtotal</td>
				</tr>
				<tr>
					<td>2</td>
					<td>sat</td>
					<td class="komp">nama komponennya </td>
					<td>@</td>
					<td>harga</td>
					<td>subtotal</td>
				</tr>
				<tr>
					<td>2</td>
					<td>sat</td>
					<td class="komp">nama komponennya </td>
					<td>@</td>
					<td>harga</td>
					<td>subtotal</td>
				</tr>
				<!-- diulang sampe sini -->
				<tr>
					<td colspan="5"><b>Subtotal</b></td>
					<td>harga</td>
				</tr>
			</table>
		</div>
	</div>
	<!-- diulang sampe sini -->
	@endforeach

	<div class="sign">
		Bandung, Bulan tahun
		<br><br><br><br><br>
		Sonny Tjahjadi
	</div>


</body>
</html>