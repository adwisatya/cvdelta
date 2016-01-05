@extends('page-teknisi')
@section('content')
	<!-- <div class="row">
		<div class="col-xs-6 col-sm-3">
			<a href="/onprogress">
				<div class="square">
					<span>Lihat Barang</span>
				</div>
			</a>
		</div>
		<div class="col-xs-6 col-sm-3">
			<a href="/find-komponen">
				<div class="square">
					<span>Request Komponen</span>
				</div>
			</a>
		</div>
	</div> -->

	<div class="row">
		<div class="col-md-6">
			<a href="/onprogress">
				<div class="box">
					<div class="box-image">
						<img src="{{url('images/service.jpg')}}" alt="Barang Perbaikan">
					</div>
					<div class="box-title">
						Barang Perbaikan
					</div>
				</div>
			</a>
		</div>
		<div class="col-md-6">
			<a href="/find-komponen">
				<div class="box">
					<div class="box-image">
						<img src="{{url('images/request.jpg')}}" alt="Request Komponen">
					</div>
					<div class="box-title">
						Request Komponen
					</div>
				</div>
			</a>
		</div>
	</div>



	<!-- <h2>Selamat datang di dashboard teknisi</h2>
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
	</table> -->
@stop