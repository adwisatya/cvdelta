@extends('page-teknisi')

@section('content')			
<h3>Silahkan Ubah Kata Sandi Anda</h3><hr/>
	<form method="post" action="">
		<input name="_token" hidden value="{!! csrf_token() !!}" />
		<table class="table table-hover table-responsive">
			<tr>
				<td>Password Lama</td>
				<td><input class="form-control" type="password" name="oldpwd"></td>
			</tr>
			<tr>
				<td>Password Baru</td>
				<td><input class="form-control" type="password" name="newpwd"></td>
			</tr>
			<tr>
				<td>Konfirmasi Password</td>
				<td><input class="form-control" type="password" name="newpwdconfirmation"></td>
			</tr>
		</table>
		<input type="submit" class="btn btn-primary" name="changepwd" value="Ubah Password">
	</form>
@endsection