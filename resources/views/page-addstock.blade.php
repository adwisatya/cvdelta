@extends('page-admin')

@section('content')
	<div class="row">
	<form method="post" action="/admin" id="form_data">
		<input name="_token" hidden value="{!! csrf_token() !!}" />
		<table class="table table-hover table-responsive" id="tblData"> 
			<caption><h2>Add Stock</h2></caption>
			<thead>
				<tr>
					<th>No Seri Komponen</th> 
					<th>Nama Komponen</th> 
					<th>Jumlah</th>
					<th>Lokasi</th> 
					<th>Keterangan</th>
					<th>Supplier</th>
					<th>Harga</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<tr>
		            <td><input type='text' class='form-control' name='no[]' placeholder='No Komponen'></td>
		            <td><input type='text' class='form-control' name='nama[]' placeholder='Nama Komponen'></td>
		            <td><input type='text' class='form-control' name='jumlah[]' placeholder='Jumlah'></td>
		            <td><input type='text' class='form-control' name='lokasi[]' placeholder='Lokasi'></td>
		            <td><input type='text' class='form-control' name='keterangan[]' placeholder='Keterangan'></td>
		            <td><input type='text' class='form-control' name='supplier[]' placeholder='Supplier'></td>
		            <td><input type='text' class='form-control' name='harga[]' placeholder='Harga'></td>
		            <td><button class="btn btn-link remove_field" role="button"> x </button></td>
	            </tr>
			</tbody>
		</table>
	</form>
	<button id="btnSub" form="form_data" class="btn btn-success" role="button"> Submit </button>
	<button id="btnAdd" class="btn btn-primary" role="button"> Tambah </button>
	<button id="btnRes" class="btn btn-warning" role="button"> Reset </button>

	</div>
	
@endsection