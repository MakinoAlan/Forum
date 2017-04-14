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
		$phone = mysql_real_escape_string($_POST['phone']);
		$intro = mysql_real_escape_string($_POST['intro']);

		mysql_connect("localhost", "root", "") or die(mysql_error());
		mysql_select_db("alan_db_one") or die("Cannot connect to Database");

		$query = mysql_query("SELECT * FROM userlist WHERE id='$id'");

		$original_firstname = "";
		$original_lastname = "";
		$original_gender = "";
		$original_birthdate = "";
		$original_email = "";
		$original_intro = "";
		$original_phone= "";
		while($row = mysql_fetch_assoc($query)) {
			$original_firstname = $row['firstname'];
			$original_lastname = $row['lastname'];
			$original_gender = $row['gender'];
			$original_birthdate = $row['birthdate'];
			$original_email = $row['email'];
			$original_phone = $row['phone'];
			$original_intro = $row['intro'];
		}

		if($firstname==$original_firstname && $lastname==$original_lastname && $gender==$original_gender && $birthdate==$original_birthdate && $email==$original_email && $original_phone==$phone && $intro==$original_intro) {
			print '<script>alert("You changed nothing!");</script>';
			print '<script>window.location.assign("../edit.php");</script>';
		}

		mysql_query("UPDATE userlist SET firstname='$firstname', lastname='$lastname', gender='$gender', birthdate='$birthdate', email='$email', phone='$phone', intro='$intro' WHERE id='$id'");

		print '<script>alert("Edit successfuly!");</script>';
		print '<script>window.location.assign("../main.php");</script>';
	}
?>