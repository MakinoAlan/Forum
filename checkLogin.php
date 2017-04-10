<?php
	session_start();
	$username = mysql_real_escape_string($_POST['InputUsername']);
	$password = mysql_real_escape_string($_POST['InputPassword']);

	mysql_connect("localhost", "root", "") or die(mysql_error());
	mysql_select_db("alan_db_one") or die("Cannot connect to database");

	$query = mysql_query("SELECT * FROM users WHERE username='$username'");
	$exist = mysql_num_rows($query);
	$table_users = "";
	$table_password = "";
	if($exist>0) {
		$row = mysql_fetch_assoc($query);
		$table_users = $row['username'];
		$table_password = $row['password'];

		if($username == $table_users && $table_password == $password) {
			$_SESSION['user'] = $username;
			header("location:main.html");
		}
		else {
			print '<script>alert("Incorrect Password");<script>';
		}

	} else {
		Print '<srcipt>alert("The username is not exist, please check it again");</script>';
	}
?>