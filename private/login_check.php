<?php

require_once dirname(__FILE__).'/../framework/helpers.php';

if(!empty($_POST)){

    if(!empty($_POST['email'])&&!empty($_POST['password'])){
        
        $result = db_query("SELECT * FROM Users where email ='".$_POST['email']."'");
        
        if($result != false){
            $user = mysqli_fetch_object($result);
            if($user->password == $_POST['password']){
                            
            session_start();
            $_SESSION['email'] = $user->email;

            $_SESSION['id'] = $user->id;

            header("Location: index.php");

            }
        }
    }


}

