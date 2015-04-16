@extends('page-admin')
@section('content')

<h3>Silahkan Ubah Kata Sandi Anda</h3><hr/>
<table class="table table-hover table-responsive">
	<form method="post" action="">
		<input name="_token" hidden value="{!! csrf_token() !!}" />
		<tr>
			<td>Password Lama</td>
			<td><input type="password" name="oldpwd" class="form-control"></td>
		</tr>
		<tr>
			<td>Password Baru</td>
			<td><input type="password" name="newpwd" class="form-control"></td>
		</tr>
		<tr>
			<td>Konfirmasi Password</td>
			<td><input type="password" name="newpwdconfirmation" class="form-control"></td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="submit" name="changepwd" value="Ubah Password">
			</td>
		</tr>
	</form>
</table>
@endsection
