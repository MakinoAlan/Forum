<!DOCTYPE html>
<html>
	<head>
		<title>Main Page</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.0/jquery-confirm.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.0/jquery-confirm.min.css">
		<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<link rel='stylesheet' href='css/main.css'/>
	</head>
	<?php
		session_start();
		if($_SESSION['user']){

		}	else {
			header("location: index.html");
		}
		$user = strtoupper($_SESSION['user']);
		$id = $_SESSION['id'];
	?>
	<body>
		<div class="header">
			<div class="container">
				<h1 id="banner">Welcom back <?php print "$user"?> !</h1>
				<div id="myBtn">
					<a class="btn btn-default pull-right" href="php/logout.php" role="button">Log Out</a>
					<a class="btn btn-default pull-right" href="prim.php">PostBoard</a>
				</div>
			</div>
		</div>

		<div class="main">
			<div class="container">
				<div class="wrapper">
					<table class="table table-bordered">
						<?php
							mysql_connect("localhost", "root", "") or die(mysql_error());
							mysql_select_db("alan_db_one") or die("Cannot connect to database");
							$query = mysql_query("SELECT * FROM userlist WHERE id='$id'");

							if(mysql_num_rows($query) == 0) {
								print '<h2 style="text-align: center; padding-top:200px">No Record!</h2>';
							}

							while($row = mysql_fetch_assoc($query)) {
								print "<tr>";
									print '<td style="width:20%">First Name</td>'; 
									print '<td align="center">' . $row['firstname'] . "</td>";
								print "</tr>";
								print "<tr>";
									print '<td style="width:20%">Last Name</td>'; 
									print '<td align="center">' . $row['lastname'] . "</td>";
								print "</tr>";
								print "<tr>";
									print '<td style="width:20%">Gender</td>'; 
									print '<td align="center">' . $row['gender'] . "</td>";
								print "</tr>";
								print "<tr>";
									print '<td style="width:20%">Birth Date</td>'; 
									print '<td align="center">' . $row['birthdate'] . "</td>";
								print "</tr>";
								print "<tr>";
									print '<td style="width:20%">Email</td>'; 
									print '<td align="center">' . $row['email'] . "</td>";
								print "</tr>";
								print "<tr>";
									print '<td style="width:20%">Self Introduction</td>'; 
									print '<td align="center" style="height:50px">' . $row['intro'] . "</td>";
								print "</tr>";
							}
						?>
					</table>

					<div class="row">
						<a class="btn btn-default pull-left" href="add.php" role="button">Create</a>
						<a class="btn btn-default pull-right" href="edit.php" role="button">Edit</a>
						<a class="btn btn-default pull-right" id="spec" href="php/Delete.php" role="button">Delete</a>
					</div>

				</div>
			</div>
		</div>
	</body>

	<script>
		$(document).ready(function() {
			$('#spec').click().confirm({
			    title: 'DELET YOUR INFO',
			    content: 'This action will delete your personal information pernamently, are you sure?',
			    buttons: {
        			confirm: function () {
            			$.alert('Confirmed!');
        			},
        			cancel: function () {
            			$.alert('Canceled!');
        			}
    			}
			});
		});
	</script>
</html>