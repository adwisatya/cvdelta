<html>
<head>
<title>CV. Delta</title>
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/style.css" />
<script src="js/bootstrap.min.js"></script>
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

</head>
<body>	
	<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="#"><img src="images/logo.png" alt="CV. Delta logo"></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Component<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="{{ url('/parkir') }}">Requested Component</a></li>
							<li><a href="#">stocks</a></li>
							<li><a href="#">stocks run out</a></li>
							<li><a href="#">add stock</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Invoice<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">Per Customer</a></li>
							<li><a href="#">Per Month</a></li>
							<li><a href="#">All</a></li>
						</ul>
					</li>
					<li><a href="#">Customer</a></li>
					<li><a href="#">Report</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Hi namanya! <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">profil</a></li>
							<li><a href="#">logout</a></li>
						</ul>
					</li>
				</ul>
			</div> <!--/.nav-collapse-->
		</div>
	</div> 
	<div class="container">
		
	@yield('content')

	</div>
	<footer class="footer">
      <div class="container">
      	<hr>
        <p class="text-muted">Copyright 2015</p>
      </div>
    </footer>
</body>
</html>