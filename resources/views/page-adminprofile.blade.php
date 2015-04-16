<html>
<head>
<title>CV. Delta</title>
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('/css/style.css') }}" />
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/addRow.js') }}"></script>

</head>
<body>	
	<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="#"><img src="{{ asset('/images/logo.png') }}" alt="CV. Delta logo"></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Component<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="{{ url('/admin/request') }}">Requested Component</a></li>
							<li><a href="{{ url('/admin/stock') }}">stocks</a></li>
							<li><a href="{{ url('/admin/minimum') }}">stocks run out</a></li>
							<li><a href="{{ url('/admin/add') }}">add stock</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Invoice<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="{{ url('/admin/invoice-per-customer') }}">Per Customer</a></li>
							<li><a href="#">Per Month</a></li>
							<li><a href="#">All</a></li>
						</ul>
					</li>
					<li><a href="{{ url('/admin/customer') }}">Customer</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Hi <?php echo Session::get('username'); ?> <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="/adminprofile">profil</a></li>
							<li><a href="/logout">logout</a></li>
						</ul>
					</li>
				</ul>
			</div> <!--/.nav-collapse-->
			</div>
		</div>
	</div>
	<div class="container">
		<div class="content">
			
			<h3>Silahkan Ubah Kata Sandi Anda</h3><hr/>
			<table class="table table-hover table-responsive">
				<form method="post" action="">
					<input name="_token" hidden value="{!! csrf_token() !!}" />
					<tr>
						<td>Password Lama</td>
						<td><input type="password" name="oldpwd"></td>
					</tr>
					<tr>
						<td>Password Baru</td>
						<td><input type="password" name="newpwd"></td>
					</tr>
					<tr>
						<td>Konfirmasi Password</td>
						<td><input type="password" name="newpwdconfirmation"></td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input type="submit" name="changepwd" value="Ubah Password">
						</td>
					</tr>
				</form>
			</table>
		</div>
	</div>
	<footer class="footer">
      <div class="container">
      	<hr>
        <p class="text-muted">Copyright 2015</p>
      </div>
    </footer>


</body>
</html>