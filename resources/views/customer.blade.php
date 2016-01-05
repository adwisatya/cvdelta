@extends('page-admin')

@section('content')
{{-- modal --}}
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahCustomer">Tambah Customer</button>

<div id="tambahCustomer" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Customer</h4>
      </div>
      <div class="modal-body">
       <form method="post" action="/admin/customer" id="form_data">
       	<div class="form-group">
			<input name="_token" hidden value="{!! csrf_token() !!}" />
       	</div>
       	<div class="form-group">
			<input class='form-control' type="text" name="nama_perusahaan" placeholder="Customer's Name">
       	</div>
       	<div class="form-group">
			<input class='form-control' type="text" name="alamat" placeholder="Customer's Address">
       	</div>
       	<div class="form-group">
			<input class='form-control' type="text" name="telepon" placeholder="Customer's Phone Number">
       	</div>
       	<div class="form-group">
			<input class='form-control' type="text" name="contact_person" placeholder="Customer's Contact Person">
       	</div>
			<br>
			<button id="btnSub" form="form_data" class="btn btn-primary" role="button"> Add Customer </button>
		</form>
      </div>
    </div>

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