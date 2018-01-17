<?php

if(!empty($_POST)){
    
    if(!empty($_POST['id'])){

        session_start();
        
        if($_SESSION['id'] == $_POST['id']){
            session_destroy();
            header("Location: index.php");
        }
    }
}    

