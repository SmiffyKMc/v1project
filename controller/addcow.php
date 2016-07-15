<?php 
    session_start();

    include("../model/DBModel.php");
    include("../controller/classes/Cow.php");
    
    if(!$_POST['cow'] == null){
        $dbModel = new DBModel();
        
        if($_POST['cow']['type'] == "Dry"){
            $gender = "Male";
        } else {
            $gender = "Female";
        }
        
        $type = $_POST['cow']['type'];
        $breed = $_POST['cow']['breed'];
        $name = $_POST['cow']['name'];
        $price = $_POST['cow']['price'];
        $county = $_POST['cow']['county'];
        
        $cow = new Cow(null, $type, $breed, $gender, $name, $_SESSION["ownerId"], 
            $price, $county);
            
        $dbModel->saveCow($cow);
        
        header('Location: ../view/account.php', false, 302);
        end;
        
    } else {
        echo "Error";
    }

?>