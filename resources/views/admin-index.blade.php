@extends('page-admin')

@section('content')
	<div class="row">
		<div class="col-xs-6 col-sm-3">
			<a href="{{ url('/admin/request') }}">
				<div class="square">
					<span>Permintaan Komponen</span>
				</div>
			</a>
		</div>
		<div class="col-xs-6 col-sm-3">
			<a href="{{ url('/admin/stock') }}">
				<div class="square">
					<span>Stok</span>
				</div>
			</a>
		</div>
		<div class="col-xs-6 col-sm-3">
			<a href="{{ url('/admin/minimum') }}">
				<div class="square">
					<span>Stok Habis</span>
				</div>
			</a>
		</div>
		<div class="col-xs-6 col-sm-3">
			<a href="{{ url('/admin/perusahaan-unbilled') }}">
				<div class="square">
					<span>Buat Invoice</span>
				</div>
			</a>
		</div>
		<div class="col-xs-6 col-sm-3">
			<a href="{{ url('/admin/customer') }}">
				<div class="square">
					<span>Data Customer</span>
				</div>
			</a>
		</div>
		<div class="col-xs-6 col-sm-3">
			<a href="{{ url('/admin/barang-masuk/view') }}">
				<div class="square">
					<span>Barang Rusak</span>
				</div>
			</a>
		</div>
		<div class="col-xs-6 col-sm-3">
			<a href="{{ url('/admin/barang-selesai/view') }}">
				<div class="square">
					<span>Lihat History</span>
				</div>
			</a>
		</div>
		<div class="col-xs-6 col-sm-3">
			<a href="/admin/currency">
				<div class="square">
					<span>Ubah Kurs</span>
				</div>
			</a>
		</div>

	</div>
		
@endsection