@extends('page-admin')

@section('content')
	<h2>Kurs Mata Uang</h2>
		<form class="form-horizontal" role="form" method="POST" action="/admin/change">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<div class="form-group">
				<label class="control-label" for="usd">1 USD = 	</label>
				<input type="text" class="form-control" name="usd" placeholder="IDR" value="{{ $currency[0]->IDR }}">
			</div>

			<div class="form-group">
				<label class="control-label" for="cny">1 CNY = 	</label>
				<input type="text" class="form-control" name="cny" placeholder="IDR" value="{{ $currency[1]->IDR }}">
			</div>

			<div class="form-group">
				<label class="control-label" for="sgd">1 SGD = 	</label>
				<input type="text" class="form-control" name="sgd" placeholder="IDR" value="{{ $currency[2]->IDR }}">
			</div>

			<div class="form-group">
				<div class="pull-right">
					<button type="submit" class="btn btn-primary">Update</button>
				</div>
			</div>
		</form>
@endsection