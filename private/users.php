<?php
require_once dirname(__FILE__).'/../framework/loggedin.php';
require_once dirname(__FILE__).'/../framework/helpers.php';

if(!empty($_POST)){
	
	if(!empty($_POST['action'])){

		switch($_POST['action']){
			
			case 'insert':
			if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['nickname'])){
			$query = "insert into users(email,password,nickname) value ('".$_POST['email']."','".$_POST['password']."','".$_POST['nickname']."')";
			db_query($query);
			}
			break;

			case 'update':
			if(!empty($_POST['id'])){
				if(!empty($_POST['email']) && !empty($_POST['nickname'])){
			$query = "update users set email = '".$_POST['email']."', nickname ='".$_POST['nickname']."' where id =". $_POST['id'];		
			db_query($query);
				}
			}
			break;

			case 'delete':
			if(!empty($_POST['id'])){
			$query = "delete from users where id =". $_POST['id'];		
			db_query($query);
			}
			break;
			
			default:
			break;
		}
	}
}


$result = db_query("select * from users");

?>




<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Dashboard Template for Bootstrap</title>

		<!-- Bootstrap core CSS -->
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	</head>

	<body>

		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Project name</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
					<li><a href="index.php">Dashboard</a></li>
					<li><a href="users.php">Users</a></li>
					<li><a href="pages.php">Pages</a></li>
					</ul>
				</div>
			</div>
		</nav>

		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 col-md-12 main">
					<h1 class="page-header">Users</h1>
					<a href="user.php" >Add new user </a>
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>id</th>
									<th>email</th>
									<th>nickname</th>
								</tr>
							</thead>
							<tbody>
								<!-- add PHP here -->
<?php
while($user = mysqli_fetch_assoc($result)){
?>



								<tr>
									<td><?php echo $user['id']; ?></td>
									<td><?php echo $user['email']; ?></td>
									<td><?php echo $user['nickname']; ?></td>
								</tr>
								<!-- add PHP here -->
<?php
}
?>

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>

