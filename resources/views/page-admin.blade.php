<html>
<head>
<title>CV. Delta</title>
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('/css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('/css/amaran.min.css') }}">
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/jquery.amaran.min.js') }}"></script>
<script src="{{ asset('/js/notification.js') }}"></script>
<script src="{{ asset('/js/notifcounter.js') }}"></script>
<script src="{{ asset('/js/addRow.js') }}"></script>
<script src="{{ asset('/js/fix.js') }}"></script>
<script src="{{ asset('/js/approval.js') }}"></script>

</head>
<body>	
	<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="{{ url('/admin')}}"><img src="{{ asset('/images/logo.png') }}" alt="CV. Delta logo"></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Component <span class="badge" id="notifCount"></span></a>
						<ul class="dropdown-menu">
							<li><a href="{{ url('/admin/request') }}">Requested Component</a></li>
							<li><a href="{{ url('/admin/stock') }}">stocks</a></li>
							<li><a href="{{ url('/admin/minimum') }}">stocks run out</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Invoice<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="{{ url('/admin/invoice-per-customer') }}">Per Customer</a></li>
							<li><a href="{{ url('/admin/perusahaan-unbilled') }}">Customer Belum ditagih</a></li>							
							<!-- <li><a href="#">Per Month</a></li>
							<li><a href="#">All</a></li> -->
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Customer<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="{{ url('/admin/customer') }}">Data Customer</a></li>
							<li><a href="{{ url('/admin/barang-masuk/view') }}">Barang Rusak</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Hi <?php echo Session::get('username'); ?> <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="/admin/currency">ubah kurs</a></li>
							<li><a href="/adminprofile">profil</a></li>
							<li><a href="/logout">logout</a></li>
						</ul>
					</li>
				</ul>
			</div> <!--/.nav-collapse-->
		</div>
	</div> 
	<div class="container">


		<div class="content">
			<div class="pagetitle">
				@yield('pagetitle')
			</div>
			@yield('content')
		</div>
		<div class="errors">
			@yield('errorMessage')
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