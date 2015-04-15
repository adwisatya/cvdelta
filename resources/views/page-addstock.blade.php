@extends('page-admin')

@section('content')
	<div class="row">
	<button id="btnSub" class="btn btn-success" role="button"> Submit </button>
	<button id="btnAdd" class="btn btn-primary" role="button"> Tambah </button>
	<button id="btnRes" class="btn btn-warning" role="button"> Reset </button>
	<table class="table table-hover table-responsive" id="tblData"> 
		<caption><h2>Stock Minimum</h2></caption>
		<thead>
			<tr>
				<th>No Seri Komponen</th> 
				<th>Nama Komponen</th> 
				<th>Jumlah</th>
				<th>Lokasi</th> 
				<th>Keterangan</th>
				<th>Supplier</th>
				<th>Harga</th>
				<th></th
			</tr>
		</thead>
		<tbody>
			<tr>
	            <td><input type='text' class='form-control' name='no[]' placeholder='Enter Name'></td>
	            <td><input type='text' class='form-control' name='nama[]' placeholder='Enter Name'></td>
	            <td><input type='text' class='form-control' name='jumlah[]' placeholder='Enter Name'></td>
	            <td><input type='text' class='form-control' name='lokasi[]' placeholder='Enter Name'></td>
	            <td><input type='text' class='form-control' name='keterangan[]' placeholder='Enter Name'></td>
	            <td><input type='text' class='form-control' name='supplier[]' placeholder='Enter Name'></td>
	            <td><input type='text' class='form-control' name='harga[]' placeholder='Enter Name'></td>
	            <td><button class="btn btn-link remove_field" role="button"> x </button></td>
            </tr>
		</tbody>
	</table>

	</div>
	
@endsection