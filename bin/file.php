<?php
Class File{
	function getList($username,$status){
		$query = mysql_query("SELECT * from file WHERE username='$username' AND status='$status'");
		/*
		while($data = mysql_fetch_array($query)){
			print $data['fileid']." ".$data['filename']." ".$data['path']."<br/>";
		}
		*/
		return $query;
	}
	function addToDB($filename,$path,$username){
		$sql = "INSERT INTO file (filename,path,status,username) VALUES('$filename','$path','1','$username')";
		$query = mysql_query($sql);
	}
	function addToTrash($id){
		$query = mysql_query("UPDATE file SET status='0' WHERE fileid='$id'");
	}
	function recover($id){
		$query = mysql_query("UPDATE file SET status='1' WHERE fileid='$id'");
	}
	function permanentDelete($id){
		$query1 = mysql_query("SELECT path FROM file WHERE fileid='$id'");
		while($tobedeleted = mysql_fetch_array($query1)){
			unlink("../files/".$tobedeleted['path']);
		}
		$query = mysql_query("DELETE from file WHERE fileid = '$id'");
	}
	function checkOwner($id){
		$query = mysql_query("SELECT username from file WHERE fileid='$id'");
		return $query;
	}
}
?>