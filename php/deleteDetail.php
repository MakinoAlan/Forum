<?php
	session_start();
	if($_SESSION['user']){

	} else {
		header("location:../index.html");
	}

	$postid = $_GET['id'];

	mysql_connect("localhost", "root", "") or die(mysql_error());
	mysql_select_db("alan_db_one") or die("Cannot connect to database");

	mysql_query("DELETE FROM posts WHERE post_id = '$postid'");
	header("location:../prim.php");
	
?>