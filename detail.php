<html>
	<head>
		<title>Post Detail</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.0/jquery-confirm.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.0/jquery-confirm.min.css">
		<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<link rel='stylesheet' href='css/detail.css'/>
	</head>

<?php
	session_start();
	if($_SESSION['user']) {

	}	else {
		header("location:index.html");
	}
	$user = $_SESSION['user'];
	$id = $_SESSION['id'];
	$postid = $_GET['id'];

	mysql_connect("localhost", "root", "") or die(mysql_error());
	mysql_select_db("alan_db_one") or die("Cannot connect to Database");

	$query = mysql_query("SELECT * FROM posts WHERE post_id='$postid'");

	$title = "";
	$content = "";
	$currentid = "";

	while($row = mysql_fetch_assoc($query)) {
		$title = $row['title'];
		$content = $row['content'];
		$currentid = $row['user_id'];
	}
?>
	<body>
		<div class="main">
			<div class="container">
				<h1><?php print $title ?></h1>
				<div class="panel">
					<p><?php print "$content"?><p>
				</div>
				<a class="btn btn-default pull-right" href="prim.php">Back</a>
				<?php
					if($currentid == $id) {
						$text = 'Are you sure?';
						print "<a class='btn btn-default pull-right' id='spec' href='php/deleteDetail.php?id=" . $postid . "' role='button'>Delete</a>";
					}
				?>
			</div>
		</div>
	</body>

</html>