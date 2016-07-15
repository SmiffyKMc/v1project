<!-- JUST A TEST PAGE -->
<?php
    session_start();
    unset($_SESSION["username"]);
    unset($_SESSION["ownerId"]);
    
    header('Location: https://workspace-smiffykmc.c9users.io/V1Project/v2/view/');

?>