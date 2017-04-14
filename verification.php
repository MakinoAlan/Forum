<html>
	<head>
		<title>Verification Page</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.0/jquery-confirm.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.0/jquery-confirm.min.css">
		<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<link rel='stylesheet' href='css/main.css'/>
	</head>

	<body>
		<div class="main">
			<div class="container">
				<h1 style="text-align: center;">User List</h1>
				<table class="table table-bordered" style="width:100%">
					<tr>
						<th>Username</th>
						<th style="width:60%">Phone Number</th>
						<th>Verification</th>
					</tr>
					<?php
						mysql_connect("localhost", "root", "") or die(mysql_error());
						mysql_select_db("alan_db_one") or die("Cannot connect to Database");

						$query = mysql_query("SELECT users.username,userlist.phone FROM users JOIN userlist WHERE users.id=userlist.id");
						if(mysql_num_rows($query) == 0) {
							print "<h1>No Customer!</h1>";
						}
						else {
							while($row = mysql_fetch_assoc($query)) {
								$username = $row['username'];
								$phone = $row['phone'];

								print "<tr>";
									print '<td align="center">' . $username . "</td>";
									print '<td align="center">' . $phone . "</td>";
									print "<td align='center'><a href='result.php?phone=" . $phone . "'>Verfiy</a></td>";
								print "</tr>";
							}
						}
					?>
				</table>
				<a class="btn btn-default pull-right" href="main.php" role="button" style="width:100px;">Back</a>
			</div>
		</div>
	</body>
</html>