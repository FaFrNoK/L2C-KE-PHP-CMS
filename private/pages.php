<?php
require_once dirname(__FILE__).'/../framework/loggedin.php';
require_once dirname(__FILE__).'/../framework/helpers.php';

if(!empty($_POST)){
	
	if(!empty($_POST['action'])){

		switch($_POST['action']){
			
			case 'insert':
			if(!empty($_POST['title']) && !empty($_POST['menu_label']) && !empty($_POST['content']) && !empty($_POST['user_id'])){
			$query = "insert into pages(title,menu_label,content,user_id) values ('".$_POST['title']."','".$_POST['menu_label']."','".$_POST['content']."' ,'".$_POST['user_id']."')";
			db_query($query);
			}
			break;

			case 'update':
			if(!empty($_POST['id'])){
				if(!empty($_POST['title']) && !empty($_POST['menu_label']) && !empty($_POST['content']) && !empty($_POST['user_id'])){
			$query = "update pages set title = '".$_POST['title']."', menu_label ='".$_POST['menu_label']."', content ='".$_POST['content']."', user_id ='".$_POST['user_id']."' where id =". $_POST['id'];		
			db_query($query);
				}
			}
			break;

			case 'delete':
			if(!empty($_POST['id'])){
			$query = "delete from pages where id =". $_POST['id'];		
			db_query($query);
			}
			break;
			
			default:
			break;
		}
		header("Location: pages.php");
	}
}

$result = db_query("select * from pages");

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

	<?php

	require_once dirname(__FILE__).'/parts/header.php';

	?>

		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 col-md-12 main">
					<h1 class="page-header">Pages</h1>
					<a href="page.php" >Add new page </a>
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>id</th>
									<th>title</th>
									<th>content</th>
                                    <th>user_id</th>
                                    <th>menu_label</th>
                                    <th>menu_order</th>
									<th>author</th>
									<th>actions</th>
								</tr>
							</thead>
							<tbody>
								<!-- add PHP here -->
<?php
while($page = mysqli_fetch_assoc($result)){
?>



								<tr>
									<td><?php echo $page['id']; ?></td>
									<td><?php echo $page['title']; ?></td>
									<td><?php echo $page['content']; ?></td>
                                    <td><?php echo $page['user_id']; ?></td>
                                    <td><?php echo $page['menu_label']; ?></td>
                                    <td><?php echo $page['menu_order']; ?></td>

									<?php
									$user_query = db_query("select * from users where id = ".$page['user_id']);
									$user = mysqli_fetch_assoc($user_query);
									?>

									<td><a href="user.php?id=<?php echo $user['id']; ?>"><?php echo $user['nickname']; ?></a></td>
									<td><a href="page.php?id=<?php echo $page['id'];?>">Update</a></td>
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

