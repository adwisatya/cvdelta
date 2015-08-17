@extends('page-admin')

@section('content')
{{-- modal --}}
		<a href="#openModal"><button id="addCust" class="btn btn-primary" role="button"> Tambah Customer </button></a>

		<div id="openModal" class="modalDialog">
			<div>
				<a href="#close" title="Close" class="close">X</a>
				<h2>Tambah Customer</h2>
				<form method="post" action="/admin/customer" id="form_data">
					<input name="_token" hidden value="{!! csrf_token() !!}" />
					<input class='form-control' type="text" name="nama_perusahaan" placeholder="Customer's Name">
					<input class='form-control' type="text" name="alamat" placeholder="Customer's Address">
					<input class='form-control' type="text" name="telepon" placeholder="Customer's Phone Number">
					<input class='form-control' type="text" name="contact_person" placeholder="Customer's Contact Person">
					<br>
					<button id="btnSub" form="form_data" class="btn btn-primary" role="button"> Add Customer </button>
				</form>
			</div>
		</div>

{{-- end modal --}}
	<div class="row">
		<table class="table table-hover table-responsive" id="tblData"> 
			<caption><h2>Customer</h2></caption>
			<thead>
				<tr>
					<th>Nama Perusahaan</th> 
					<th>Alamat</th> 
					<th>Telepon</th>
					<th>Contact Person</th> 
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($customer as $cust)
				<tr>
		            <td class="namaPerusahaan">{{$cust->nama_perusahaan}}</td>
		            <td>{{$cust->alamat}}</td>
		            <td>{{$cust->telepon}}</td>
		            <td>{{$cust->contact_person}}</td>
		            <!-- <td><a href="/admin/customer/edit/{{$cust->nama_perusahaan}}"><button form="editCust" class="btn btn-success" title="edit" role="button" type="submit">edit</button></a> -->
		            <!-- <td><a href="/admin/customer/delete/{{$cust->nama_perusahaan}}"><button form="deleteCust" class="btn btn-danger" title="hapus" role="button" type="submit">x</button></a></td> -->
	            </tr>
	            @endforeach
			</tbody>
		</table>
	</div>
@endsection