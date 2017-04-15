<html>
	<head>
		<title>Post Page</title>

		<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<link href="https://fonts.googleapis.com/css?family=Concert+One" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Crimson+Text" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Passion+One" rel="stylesheet">
		<link rel='stylesheet' href='css/prim.css'/>
		<link rel='stylesheet' href='css/footable.bootstrap.css'/>
		<link rel='stylesheet' href='css/footable.bootstrap.min.css'/>
		<script src="libs/jquery/jquery.js"></script>
		<script src="libs/jquery/jquery.backstretch.min.js"></script>
		<script src="js/footable.js"></script>
		<script src="js/footable.min.js"></script>
	</head>

	<?php
		session_start();
		if($_SESSION['user']){

		} else {
			header("location:index.html");
		}
		$user = $_SESSION['user'];
		$id = $_SESSION['id'];
	?> 

	<body>
		<div class="header">
			<div class="container">
				<div class="row">
					<h1>Say Anything You Want</h1>
					<a class="btn btn-default pull-right" href="php/logout.php" role="button">Log Out</a>
					<a class="btn btn-default pull-right" href="main.php">Profile</a>
				</div>
			</div>
		</div>

		<div class="main">
			<div class="container">
				<table class="table table-hover" data-paging="true" data-sorting="true" style="width:100%">
					<thead>
						<tr>
							<th style="width:60%">Title</th>
							<th>Author</th>
							<th data-type="date" data-format-string="MMMM Do YYYY">time posted</th>
						</tr>
					</thead>
					<tbody>
					<?php
						mysql_connect("localhost", "root", "") or die(mysql_error());
						mysql_select_db("alan_db_one") or die("Cannot connect to Database");

						$query = mysql_query("SELECT * FROM posts");
						if(mysql_num_rows($query) == 0) {
							print "<h1>There is no post!</h1>";
						}
						else {
							while($row = mysql_fetch_assoc($query)) {
								$postid = $row['post_id'];
								$title = $row['title'];
								$userid = $row['user_id'];
								$time = $row['create_date'];
								$query_one = mysql_query("SELECT * FROM users WHERE id='$userid'");
								$row_one = mysql_fetch_assoc($query_one);
								$author = $row_one['username'];

								print "<tr>";
									print '<td align="center"><a href="detail.php?id=' . $postid . '">' . $title . "</a></td>";
									print '<td align="center">' . $author . "</td>";
									print '<td align="center">' . $time . "</td>";
								print "</tr>";
							}
						}
					?>
					</tbody>
				</table>
			</div>
		</div>

		<div class="add">
			<div class="container">
				<form class="form-horizontal" action="php/post.php" method="POST">
					<div class="form-group">
						<label class="control-label">Title</label>
						<input type="text" class="form-control" name="title" placeholder="Title">
					</div>
					<div class="form-group">
						<label class="control-label">Content</label>
						<textarea type="text" class="form-control" rows="5" name="content"></textarea>
					</div>
					<button class="btn btn-default pull-right" type="submit">Submit</button>
				</form>
			</div>
		</div>
		<script>
			$.backstretch("img/bg3.jpg");
			$('.table').footable();
		</script>
	</body>
</html>