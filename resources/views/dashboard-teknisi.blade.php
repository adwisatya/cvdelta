@extends('page-teknisi')
@section('content')
	<h2>Selamat datang di dashboard teknisi</h2>
	<h4>Silahkan gunakan menu pada navigasi untuk menggunakan layanan yang ada.</h4>
	<hr/>
	<h4>Daftar Layanan</h4>
	<table cellpadding="10">
		<tr>
			<td>
				Request Komponen
			</td>
			<td>
				Membuat permintaan komponen untuk kebutuhan perbaikan elektronik kepada bagian administrasi
			</td>
		</tr>
		<tr>
			<td>
				On Progress
			</td>
			<td>
				Menampilkan daftar barang yang sedang diperbaiki oleh teknisi
			</td>
		</tr>
		<tr>
			<td>
				History
			</td>
			<td>
				Menampilkan daftar barang yang belum maupun selesai diperbaiki
			</td>
		</tr>
		<tr>
			<td>
				Profil
			</td>
			<td>
				Mengubah password teknisi
			</td>
		</tr>
		<tr>
			<td>
				Logout
			</td>
			<td>
				Keluar dari sistem
			</td>
		</tr>
	</table>
@stop