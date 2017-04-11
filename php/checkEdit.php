<?php
	session_start();
	if($_SESSION['user']) {

	} else {
		header("location:../index.html");
	}

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		$id = $_SESSION['id'];
		$firstname = mysql_real_escape_string($_POST['firstname']);
		$lastname = mysql_real_escape_string($_POST['lastname']);
		$gender = mysql_real_escape_string($_POST['gender']);
		$birthdate = mysql_real_escape_string($_POST['birthdate']);
		$email = mysql_real_escape_string($_POST['email']);
		$intro = mysql_real_escape_string($_POST['intro']);

		mysql_connect("localhost", "root", "") or die(mysql_error());
		mysql_select_db("alan_db_one") or die("Cannot connect to Database");

		mysql_query("UPDATE userlist SET firstname='$firstname', lastname='$lastname', gender='$gender', birthdate='$birthdate', email='$email', intro='$intro' WHERE id='$id'");

		print '<script>alert("Add successfuly!");</script>';
		print '<script>window.location.assign("../main.php");</script>';
	}
?>