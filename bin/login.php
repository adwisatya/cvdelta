<?php
	session_start();
	require_once("../connect/connect.php");
	Class Login{
		function cekLogin($username, $password){
			$query = mysql_query("SELECT password from user WHERE username='$username'");
			$data = mysql_fetch_array($query);
			print $data['password'];
			print md5($password);
			if(md5($password) == $data['password']){
				$_SESSION['username'] = $username;
				header("location: ../dashboard.php");
			}else{
				header("location: ../login.php");
			}
		}
	}
?>