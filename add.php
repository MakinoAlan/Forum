<html>
	<head>
		<title>Add Page</title>

		<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	</head>

	<?php 
		session_start();
		if($_SESSION['user']){

		} else {
			header("location:index.html");
		}

		$id = $_SESSION['id'];

		mysql_connect("localhost", "root", "") or die(mysql_error());
		mysql_select_db("alan_db_one") or die("Cannot connect to database");

		if(mysql_num_rows(mysql_query("SELECT * FROM userlist Where id = '$id'")) != 0){
			print '<script>alert("You already have record in the database! Please delete or edit it.");</script>';
			print '<script>window.location.assign("main.php");</script>';
		}

		$user = strtoupper($_SESSION['user']);
	?>

	<body>
		<div class="header">
			<div class="container">
				<h1>Hello <?php print "$user" ?>! Let's Create your profile here.</h1>
			</div>
		</div>

		<div class="main">
			<div class="container">
				<form action="php/checkAdd.php", method="POST">
					<div class="form-group">
						<label>First Name</label>
						<input type="text" class="form-control" name="firstname" placeholder="First Name" required="required">
					</div>
					<div class="form-group">
						<label>Last Name</label>
						<input type="text" class="form-control" name="lastname" placeholder="Last Name" required="required">
					</div>
					<div class="form-group">
						<label>Gender</label>
						<input type="text" class="form-control" name="gender" placeholder="male/female">
					</div>
					<div class="form-group">
						<label>Birth Date</label>
						<input type="text" class="form-control" name="birthdate" placeholder="yyyy-mm-dd">
					</div>
					<div class="form-group">
						<label>Email Address</label>
						<input type="text" class="form-control" name="email" placeholder="xxxx@example.com">
					</div>
					<div class="form-group">
						<label>Self Introduction</label>
						<textarea class="form-control" rows="5" name="intro"></textarea>
					</div>
						<button class="btn btn-default pull-right" type="submit" style="margin-top:30px;">Submit</button>
				</form>
			</div>
		</div>
	</body>
</html>