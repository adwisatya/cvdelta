<html>
<head>
<title>CV. Delta</title>
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/style.css" />
<script src="js/bootstrap.min.js"></script>
<!-- <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script> -->

</head>
<body>	
	
		<div class="navbar navbar-inverse navbar-fixed-top headroom" >
			<div class="container">
				<div class="navbar-header">
					<!-- Button for smallest screens -->
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
					<a class="navbar-brand" href="index"><img src="images/logo.png" alt="CV. Delta logo"></a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav pull-right">
						<li><a href="/request_komponen">Request Komponen</a></li>
						<li><a href="#">On Progress</a></li>
						<li><a href="#">History</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo Session::get('username'); ?> <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="/profile">profil</a></li>
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
			Selamat datang, <?php echo Session::get('username'); ?>
			<br/>Silahkan ganti password Anda melalui form berikut ini<br/>
			<form method="post" action="">
				<input name="_token" hidden value="{!! csrf_token() !!}" />
				<label>
					Password lama:
				</label>
				<input type="password" name="oldpwd"><br/>
				<label>
					Password baru:
				</label>
				<input type="password" name="newpwd"><br/>
				<label>
					Konfirmasi Password Baru:
				</label>
				<input type="password" name="newpwdconfirmation"><br/>
				<input type="submit" name="changepwd" value="Ubah Password">
			</form>
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