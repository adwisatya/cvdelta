<?php
	if(file_exists("../connect/connect.php")){
		include("../connect/connect.php");
	}else{
		include("connect/connect.php");
	}
	Class Register{
		/* OK */
		function addUser($username, $password, $email){
			$query = mysql_query("INSERT INTO user (username, password, email, active) VALUES('$username','".md5($password)."','$email','1')");
		}
		/* OK */
		function delUser($username){
			$query = mysql_query("DELETE FROM user WHERE username = '$username'");
		}
		/* OK */
		function activateUser($username){
			$query = mysql_query("UPDATE user SET active=1 WHERE username='$username'");
		}
		/* OK */
		function updateInfo($username, $password,$email){
			$query = mysql_query("UPDATE user SET email='$email',password='".md5($password)."' WHERE username='$username'");
		}
		/* OK */
		function showUser(){
			$query = mysql_query("SELECT * from user");
			return $query;
		}
		function getData($username,$var){
			$query = mysql_query("SELECT $var from user WHERE username='$username'");
			while($hasil = mysql_fetch_array($query)){
				$returnVal = $hasil[$var];
			}
			return $returnVal;
		}
	}
?>