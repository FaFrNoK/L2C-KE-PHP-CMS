<?php

require_once dirname(__FILE__).'/../framework/helpers.php';

$result = db_query("select * from pages;");

while($row = mysqli_fetch_assoc($result)){
    var_dump($row); 
    }

?>