@extends('page-teknisi')
@section('content')
		<form method="post" action="/request_komponen">
			<input name="_token" hidden value="{!! csrf_token() !!}" />
			<div class="form-group">
				<label for="username">Username</label>
				<input type="input" class="form-control" id="username" placeholder="Enter username" name="username">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
			</div><br><br>
			<input type="submit" name="submit" class="form-control" value="Login">
		</form>
@stop