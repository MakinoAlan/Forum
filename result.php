<html>
	<head>
		<title>Result Page</title>

		<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<link rel='stylesheet' href='css/login.css'/>
	</head>

	<?php
		session_start();
		if($_SESSION['user']){

		} else {
			header("location:index.html");
		}
		$id = $_SESSION['id'];
		$user = strtoupper($_SESSION['user']);
		$phone = $_GET['phone'];

		$response = file_get_contents("http://apilayer.net/api/validate?access_key=42b8a7e7426972885d2bfca53d53741b&number=" . $phone . "&format=1");
		$response = json_decode($response,true);
	?>

	<body>
		<div class="main">
			<div class="container">
				<h1 style="text-align: center;">Verification Result</h1>
				<table class="table table-bordered">
					<?php
						if($response['valid']=='ture'){
							print "<tr>";
								print '<td style="width:20%">Number</td>'; 
								print '<td align="center">' . $response['number'] . "</td>";
							print "</tr>";
							print "<tr>";
								print '<td style="width:20%">Local Format</td>'; 
								print '<td align="center">' . $response['local_format'] . "</td>";
							print "</tr>";
							print "<tr>";
								print '<td style="width:20%">International Format</td>'; 
								print '<td align="center">' . $response['international_format'] . "</td>";
							print "</tr>";
							print "<tr>";
								print '<td style="width:20%">Country Prefix</td>'; 
								print '<td align="center">' . $response['country_prefix'] . "</td>";
							print "</tr>";
							print "<tr>";
								print '<td style="width:20%">Country Code</td>'; 
								print '<td align="center">' . $response['country_code'] . "</td>";
							print "</tr>";
							print "<tr>";
								print '<td style="width:20%">Country Name</td>'; 
								print '<td align="center">' . $response['country_name'] . "</td>";
							print "</tr>";
							print "<tr>";
								print '<td style="width:20%">Location</td>'; 
								print '<td align="center">' . $response['location'] . "</td>";
							print "</tr>";
							print "<tr>";
								print '<td style="width:20%">Carrier</td>'; 
								print '<td align="center">' . $response['carrier'] . "</td>";
							print "</tr>";
							print "<tr>";
								print '<td style="width:20%">Line Type</td>'; 
								print '<td align="center">' . $response['line_type'] . "</td>";
							print "</tr>";
						}
						else {
							print '<script>alert("This is not a valid phone number!");</script>';
							print '<script>window.location.assign("verification.php");</script>';
						}
					?>
				</table>
				<a class="btn btn-default pull-right" href="verification.php" role="button" style="width:100px;">Back</a>
			</div>
		</div>
	</body>
</html>