<?php
    //include('/v2/controller/classes/Cow.php');
    //include('/controller/classes/Owner.php');
    include("model/DBController.php");
    include("controller/classes/EncryptPassword.php");
    
    $enPassword = new EncryptPassword();
    
    //$username = "Samm";
    //$password = '$2y$10$f9sWQaIrO07zmEOEZUsp1.9RaEi9CGcqLi7TaeC8ADuR0x8iiwAd6';
    
    $hashed = $enPassword->encryptPassword("kieranmCC");
    echo $hashed;
    
    //if($enPassword->verifyPassword($username, $password)){
    //    echo "You're in!";
    //} else {
    //    echo "You're out!";
    //}
    
    // $2y$10$f9sWQaIrO07zmEOEZUsp1.9RaEi9CGcqLi7TaeC8ADuR0x8iiwAd6

?>

