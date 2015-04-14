@extends('page-teknisi')
@section('content')
			Selamat datang <?php echo Session::get('username'); ?>
			Anda adalah seorang <?php echo Session::get('role'); ?>
@stop