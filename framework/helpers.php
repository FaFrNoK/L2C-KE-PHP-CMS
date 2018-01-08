<?php

function db_connect(){

require dirname(__FILE__).'/../config/database.php';

return mysqli_connect($database["host"], $database["user"], $database["pass"], $database["name"],  $database["port"]);
}

function db_query($sql_string){

    $db = db_connect();

    //mysqli_query($db,$sql_string);
    
    return mysqli_query($db,$sql_string);

}


?>