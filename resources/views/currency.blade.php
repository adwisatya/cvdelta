@extends('page-admin')

@section('pagetitle')
	Kurs Mata Uang
@endsection
@section('content')
		<form class="form-horizontal" role="form" method="POST" action="/admin/change">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<table>
				<th>
					<td>Mata uang</td>
					<td>Kurs</td>
				</th>
				<tr>
					<td>USD</td>
					<td><input type="text" class="form-control" name="usd" placeholder="IDR" value="{{ $currency[0]->IDR }}"></td>
				</tr>
				<tr>
					<td>CNY</td>
					<td><input type="text" class="form-control" name="cny" placeholder="IDR" value="{{ $currency[1]->IDR }}"></td>
				</tr>
				<tr>
					<td>SGD</td>
					<td><input type="text" class="form-control" name="sgd" placeholder="IDR" value="{{ $currency[2]->IDR }}"></td>
				</tr>
			</table>

			
			<div class="form-group">
				<div class="pull-right">
					<button type="submit" class="btn btn-primary">Update</button>
				</div>
			</div>
		</form>
@endsection