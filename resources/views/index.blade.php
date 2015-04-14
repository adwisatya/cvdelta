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
<body class="index_content">
		<div class="navbar navbar-inverse navbar-fixed-top headroom" >
			<div class="container">
				<div class="navbar-header">
					<!-- Button for smallest screens -->
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
					<a class="navbar-brand indexlogo" href="#"><img src="images/logo.png" alt="CV. Delta logo"></a>
				</div>
			</div>
		</div> 
	<div class="container">
		<div class="indexpage">
			<div class="col-md-7">
				<h2>Selamat datang!</h2><br>
				<h3>Silahkan login menggunakan akun yang sudah terdaftar untuk mengakses layanan aplikasi</h3>
			</div>
			<div class="col-md-5">
				<form method="post" action="/index">
				    <input name="_token" hidden value="{!! csrf_token() !!}" />
					<div class="form-group">
						<label for="username">Username</label>
						<input type="input" class="form-control" id="username" placeholder="Enter username" name="username">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
					</div><br><br>
					<input type="submit" name="submit">
				</form>
			</div>
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