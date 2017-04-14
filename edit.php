<html>
	<head>
		<title>Edit Page</title>

		<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<link rel='stylesheet' href='css/edit.css'/>
	</head>

	<?php
		session_start();
		if($_SESSION['user']){

		} else {
			header("location:index.html");
		}
		$id = $_SESSION['id'];
		$user = strtoupper($_SESSION['user']);
	?>

	<body>
		<div class="header">
			<div class="container">
				<h1>Dear <?php print "$user" ?>, please manage your personal information here!</h1>
			</div>
		</div>

		<div class="main">
			<div class="container">
				<?php
							mysql_connect("localhost", "root", "") or die(mysql_error());
							mysql_select_db("alan_db_one") or die("Cannot connect to Database");

							$query = mysql_query("SELECT * FROM userlist WHERE id='$id'");

							while($row = mysql_fetch_assoc($query)) {
								$firstname = $row['firstname'];
								$lastname = $row['lastname'];
								$gender = $row['gender'];
								$birthdate = $row['birthdate'];
								$email = $row['email'];
								$phone = $row['phone'];
								$intro = $row['intro'];
							}
				?>	
				<form action="php/checkEdit.php", method="POST">		
					<div class="form-group">
						<label>First Name</label>
						<input type='text' class='form-control la' name="firstname" value=<?php print "$firstname"?>>
					</div>
					<div class="form-group">
						<label>Last Name</label>
						<input type='text' class='form-control la' name="lastname" value=<?php print "$lastname"?>>
					</div>
					<div class="form-group">
						<label>Gender</label>
						<input type='text' class='form-control la' name="gender" value=<?php print "$gender"?>>
					</div>
					<div class="form-group">
						<label>Birth Date</label>
						<input type='text' class='form-control la' name="birthdate" value=<?php print "$birthdate"?>>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type='text' class='form-control la' name="email" value=<?php print "$email"?>>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type='text' class='form-control la' name="phone" value=<?php print "$phone"?>>
					</div>
					<div class="form-group">
						<label>Self Introduction</label>
						<input type='text' class='form-control la' name="intro" value=<?php print "$intro"?>>
					</div>
					<button class="btn btn-default pull-right" type="submit">Confirm</button>
					<a class="btn btn-default pull-left" href='main.php' role='button'>Cancel</a>
				</form>
			</div>
		</div>
	</body>
</html>