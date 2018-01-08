<?php

require_once dirname(__FILE__).'/../framework/helpers.php';

$result = db_query("select * from pages;");

//while($row = mysqli_fetch_assoc($result)){
 //   var_dump($row); 
 //   }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog Template for Bootstrap</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 
  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="#">Home</a>
        </nav>
      </div>
    </div>

    <div class="container">

      <div class="blog-header">
        <h1 class="blog-title">The Bootstrap Blog</h1>
        <p class="lead blog-description">The official example template of creating a blog with Bootstrap.</p>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">

<?php
while($row = mysqli_fetch_assoc($result)){
?>

            <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title'] ?> </h2>
            <p class="blog-post-meta">
            <?php 
            $user = db_query("select * from users where ID = ".$row['user_id']);
            $user_data = mysqli_fetch_assoc($user); 
            ?>
            <a href="mailto: <?php echo $user_data['email'] ?> "> 
            <?php echo $user_data['email'] ?> </a></p>
            <p><?php echo $row['content'] ?></p>
            </div><!-- /.blog-post -->
<?php
}
?>
          
        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>
          
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </div><!-- /.container -->

    <footer class="blog-footer">
      <p>Blog template built for <a href="http://getbootstrap.com">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="vendor/boostrap/js/boostrap.min.js"></script>
   </body>
</html>
