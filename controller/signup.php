<?php
    include('../controller/classes/Owner.php');
    include('../model/DBController.php');
    include('../controller/classes/EncryptPassword.php');
    
    if(!empty($_POST['data']['fName'])){
        $dbConntroller = new DBController();
        $passwordEn = new EncryptPassword();
        
        $fName = htmlentities($_POST['data']['fName']);
        $lName = htmlentities($_POST['data']['lName']);
        $username = htmlentities($_POST['data']['username']);
        $password = htmlentities($_POST['data']['password']);
        $email = htmlentities($_POST['data']['email']);
        $address = htmlentities($_POST['data']['address']);
        
        $password = $passwordEn->encryptPassword($password);
    
        $owner = new Owner($fName, $lName, $username, $email, $password, $address, 0);
        
        $dbConntroller->saveOwner($owner);
        
        header('Location: https://workspace-smiffykmc.c9users.io/V1Project/v2/view/login.php');
        
        $passwordEn = null;
        
        end();
    } else {
        echo "Error";
    }
?>