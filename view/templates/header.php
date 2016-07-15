<?php
    session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Scripts -->
        <script type="text/javascript" src="../controller/scripts/FormValidate.js"></script>
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
        <script type="text/javascript" src="../controller/scripts/Scripts.js"></script>
        
        <!-- Stylesheets -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" 
            integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" 
            crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../view/stylesheets/stylesheet.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
        
    </head>
    <body style="font-family:'Roboto Condensed';">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" style="padding-top: 0px; " href="../view/index.php">
                        <img src="../assets/cow.png" style="width: 50px; height=: 50px;"></img>
                    </a>
                    
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                     </button>
                     
                </div>
                <div>
                    <div id="navbar" class="navbar-collapse collapse">
                      <ul class="nav navbar-nav navbar-right">
                            <?php if($_SESSION["username"] == null){?>
                                <li><a href="../view/login.php">Login</a></li>
                                <li><a href="../view/signup.php">Sign Up</a></li>
                            <?php } else { ?>
                                <li><a href="../view/logouttest.php">Logout</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>