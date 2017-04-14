<?php
	session_start();
	if($_SESSION['user']){
	} else {
		header("location:../index.html");
	}

	mysql_connect("localhost", "root", "") or die(mysql_error());
	mysql_select_db("alan_db_one") or die("Cannot connect to database");

	$id = $_SESSION['id'];
	mysql_query("DELETE FROM userlist WHERE id = '$id'");
	header("location:../main.php");
?>
