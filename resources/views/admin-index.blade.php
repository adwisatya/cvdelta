@extends('page-admin')

@section('content')
	<div class="row">
		<div class="col-xs-6 col-sm-4">
			<a href="{{ url('/admin/request') }}">
				<div class="box">
					<div class="box-image">
						<img src="{{url('images/admin/admin-req.jpg')}}" alt="Permintaan Komponen">
					</div>
					<div class="box-title">
						Permintaan Komponen <span>({{$notifNum}})</span>
					</div>
				</div>
			</a>
		</div>
		<div class="col-xs-6 col-sm-4">
			<a href="{{ url('/admin/perusahaan-unbilled') }}">
				<div class="box">
					<div class="box-image">
						<img src="{{url('images/admin/admin-invoice.jpg')}}" alt="Buat Invoice">
					</div>
					<div class="box-title">
						Buat Invoice
					</div>
				</div>
			</a>
		</div>
		<div class="col-xs-6 col-sm-4">
			<a href="{{ url('/admin/barang-masuk/view') }}">
				<div class="box">
					<div class="box-image">
						<img src="{{url('images/admin/admin-barang.jpg')}}" alt="Barang Perbaikan">
					</div>
					<div class="box-title">
						Barang Perbaikan
					</div>
				</div>
			</a>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-6 col-sm-3">
			<a href="{{ url('/admin/stock') }}">
				<div class="box">
					<div class="box-image">
						<img src="{{url('images/admin/admin-stock.jpg')}}" alt="Stok Barang">
					</div>
					<div class="box-title">
						Stok Barang
					</div>
				</div>
			</a>
		</div>
		<div class="col-xs-6 col-sm-3">
			<a href="{{ url('/admin/customer') }}">
				<div class="box">
					<div class="box-image">
						<img src="{{url('images/admin/admin-customer.jpg')}}" alt="Data Customer">
					</div>
					<div class="box-title">
						Data Customer
					</div>
				</div>
			</a>
		</div>
		<div class="col-xs-6 col-sm-3">
			<a href="{{ url('/admin/barang-selesai/view') }}">
				<div class="box">
					<div class="box-image">
						<img src="{{url('images/admin/admin-history.jpg')}}" alt="Lihat History">
					</div>
					<div class="box-title">
						Lihat History
					</div>
				</div>
			</a>
		</div>
		<div class="col-xs-6 col-sm-3">
			<a href="/admin/currency">
				<div class="box">
					<div class="box-image">
						<img src="{{url('images/admin/admin-kurs.jpg')}}" alt="Ubah Kurs">
					</div>
					<div class="box-title">
						Ubah Kurs
					</div>
				</div>
			</a>
		</div>
	</div>
		
@endsection