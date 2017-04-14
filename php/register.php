<?php
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$username = mysql_real_escape_string($_POST['InputUsername']);
		$password = mysql_real_escape_string($_POST['InputPassword']);
		$bool = true;

		mysql_connect("localhost", "root", "") or die(mysql_error());
		mysql_select_db("alan_db_one") or die("Cannot connect to database");
		$query = mysql_query("Select * from users");
		while($row = mysql_fetch_array($query)) {
			$table_users = $row['username'];
			if($username == $table_users) {
				$bool = false;
				print '<script>alert("Username has been taken!");</script>';
				print '<script>window.location.assign("register.php);</script>';
				
			}
		}

		if($bool) {
			mysql_query("INSERT INTO users (username, password) VALUES ('$username','$password')");
			print '<script>alert("Successfully Registered!");</script>';
			print '<script>window.location.assign("../index.html");</script>';
		}
	}
?>