<?php
require_once dirname(__FILE__).'/../framework/loggedin.php';
require_once dirname(__FILE__).'/../framework/helpers.php';

if(!empty($_REQUEST['id'])){

    $result = db_query("SELECT * FROM pages where id ='".$_REQUEST['id']."'");

    $page = mysqli_fetch_object($result);
}
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
					<h1 class="page-header"> 
                    
                    <?php
                    if(!empty($page)){
                    
                        echo "Update page";
                    }
                        else
                    { 
                        echo "New page";
                    }
                    ?>
                    </h1>

					<form class="form-signin" method="POST" action="pages.php">
						<input type="hidden" name="action" value="<?php echo empty($page) ? "insert" : "update" ?>">
						<input type="hidden" name="id" value="<?php echo !empty($page) ? $page->id : "" ?>">
						<input type="hidden" name="user_id" value="<?php echo !empty($page) ? $page->user_id : "" ?>">
						<input type="hidden" name="menu_order" value="0">

						<label for="title" class="sr-only">Title</label>
						<input type="text" id="title" name="title" value="<?php echo !empty($page) ? $page->title : "" ?>" class="form-control" placeholder="Title" required autofocus>

						<label for="menu_label" class="sr-only">Label</label>
						<input type="text" id="menu_label" name="menu_label" value="<?php echo !empty($page) ? $page->menu_label : "" ?>" class="form-control" placeholder="Label" required>

						<label for="content" class="sr-only">Content</label>
						<textarea id="content" name="content" class="form-control" placeholder="Content"><?php echo !empty($page) ? $page->content : "" ?></textarea>
						
						<button class="btn btn-lg btn-primary btn-block" type="submit">Save</button>
					</form>
					
					<?php 
					if(!empty($page)){
					?>
					<form class="form-signin" method="POST" action="pages.php">
						<input type="hidden" name="action" value="delete">
						<input type="hidden" name="id" value="<?php echo !empty($page) ? $page->id : "" ?>">
						<button class="btn btn-lg btn-danger btn-block" type="submit">Delete</button>
					</form>
					<?php 
					}
					?>

				</div>
			</div>
		</div>

		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>