<html>
<head>
<title>CV. Delta</title>
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/style.css" />
<script src="js/bootstrap.min.js"></script>
<script src="{{ asset('/js/notify.js') }}"></script>
<!-- <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script> -->

</head>
<body>	
		<div class="navbar navbar-inverse navbar-fixed-top headroom" >
			<div class="container">
				<div class="navbar-header">
					<!-- Button for smallest screens -->
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
					<a class="navbar-brand" href="{{ url('/')}}"><img src="{{ asset('/images/logo.png') }}" alt="CV. Delta logo"></a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav pull-right">
						<li><a href="/find-komponen">Request Komponen</a></li>
						<li><a href="/onprogress">On Progress</a></li>
						<li><a href="/history">History</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Hi, <?php echo Session::get('username'); ?> <b class="caret"></b></a>
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
			@yield('content')
		</div>
		<div class="errors">
			@if($errors->any())
				<ul class="alert alert-danger">
					@foreach($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
				</ul>
			@endif
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