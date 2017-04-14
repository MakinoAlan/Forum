<?php
	session_start();
	if($_SESSION['user']){

	} else {
		header("location:../index.php");
	}
	$user = $_SESSION['user'];
	$id = $_SESSION['id'];

	if($_SERVER['REQUEST_METHOD'] == "POST") {

		$title = mysql_real_escape_string($_POST['title']);
		$content = mysql_real_escape_string($_POST['content']);
		$date = date('Y-m-d H:i:s');

		mysql_connect("localhost", "root", "") or die(mysql_error());
		mysql_select_db("alan_db_one") or die("Cannot connect to Database");

		mysql_query("INSERT INTO posts(user_id,title,content,create_date) VALUES ('$id','$title','$content','$date')");

		print '<script>alert("Post successfuly!");</script>';
		print '<script>window.location.assign("../prim.php");</script>';
		
	}
?>