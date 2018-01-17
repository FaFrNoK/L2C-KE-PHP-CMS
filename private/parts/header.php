<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Learn2Code CMS</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
					<li><a href="index.php">Dashboard</a></li>
					<li><a href="users.php">Users</a></li>
					<li><a href="pages.php">Pages</a></li>
					
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                    aria-expanded="false"><?php echo $_SESSION['email']; ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                    <li><a href="#" onclick="javascript: document.getElementById('logout').submit()">Logout</a></li>
                    </ul>
                    </li>
                    </ul>
				</div>
			</div>
		<form id="logout" action="logout.php" method="POST">
        <input type="hidden" name="id" value="<?php echo !empty($_SESSION['id']) ? $_SESSION['id'] : "" ?>">
        </form>
</nav>