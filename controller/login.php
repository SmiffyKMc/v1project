<?php
    session_start();
    include('../model/DBModel.php');
    include('classes/EncryptPassword.php');
    
    $dbController = new DBModel();
    $passwordEn = new EncryptPassword();
    
    $username = htmlentities($_POST['data']['username']);
    $password = htmlentities($_POST['data']['password']);
    
    if(!empty($username) && !empty($password)){
        $owner = $dbController->getOwner($username);
        
        $passwordTest = $passwordEn->verifyPassword($password, $owner[5]);
        
        if($owner[0] == null){
            $_SESSION["error"] = "You need to input something!";
            header('Location: ../view/login.php', false, 302);
        } else if($passwordTest == false) {
            $_SESSION["error"] = "Details Incorrect!";
            header('Location: ../view/login.php', false, 302);
        } else {
            $_SESSION["ownerId"] = $owner[0];
            $_SESSION["username"] = $owner[3];
            header('Location: ../view/account.php', false, 302);
            end;
        }
    } else {
        echo "Error";
    }

?>