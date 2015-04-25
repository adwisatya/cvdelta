<?php 
	require_once("main.php");
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$loginer = new Login();

	$loginer->cekLogin($username,$password);
	//if(isset($_POST['submit'])){
	///	$loginer->login($username, $password);
	//}
?>