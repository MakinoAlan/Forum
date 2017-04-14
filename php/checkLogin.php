<?php
	session_start();
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$username = mysql_real_escape_string($_POST['InputUsername']);
		$password = mysql_real_escape_string($_POST['InputPassword']);

		mysql_connect("localhost", "root", "") or die(mysql_error());
		mysql_select_db("alan_db_one") or die("Cannot connect to database");

		$query = mysql_query("SELECT * FROM users WHERE username='$username'");
		$exist = mysql_num_rows($query);
		$table_users = "";
		$table_password = "";
		$table_id = "";
		if($exist>0) {
			$row = mysql_fetch_assoc($query);
			$table_users = $row['username'];
			$table_password = $row['password'];
			$table_id = $row['id'];

			if($username == $table_users && $table_password == $password) {
				$_SESSION['user'] = $username;
				$_SESSION['id'] = $table_id;
				header("location:../prim.php");
			}
			else {
				print '<script>alert("Incorrect Password");<script>';
			}

		} else {
			Print '<script>alert("The username is not exist, please check it again");</script>';
			print '<script>window.location.assign("../index.html");</script>';
		}
	}
?>