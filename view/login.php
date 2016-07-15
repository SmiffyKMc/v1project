<?php session_start() ?>
<?php require("../view/templates/header.php"); ?>
    <div class="container container-center">
        <?php 
            if($_SESSION["error"] == null){
                echo "<div id='error_div_login' role='alert'><p id='error_par_login'></p></div>";
            } elseif ($_SESSION["error"] == "Password Incorrect!") {
                echo "<div id='error_div_login' class='alert alert-danger' role='alert'><p id='error_par_login'>Password Incorrect!</p></div>";
                $_SESSION["error"] = null;
            } elseif ($_SESSION["error"] == "Details Incorrect!") {
                echo "<div id='error_div_login' class='alert alert-danger' role='alert'><p id='error_par_login'>Details Incorrect!</p></div>";
                $_SESSION["error"] = null;
            } else {
                
            }
        ?>
        <div id="error_div_login" role="alert"><p id="error_par_login"></p></div>
        <div style="display: block; vertical-align: middle;">
        <h1>Login</h1>
        <form method="POST" name="loginForm" action="../controller/login.php" onsubmit="return validateLogin()">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-8 form-group">
                    Username:
                    <input class="form-control" id="ulogin" type="text" name="data[username]"/>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-8 form-group">
                    Password:
                    <input class="form-control" id="plogin" type="password" name="data[password]"/>
                </div>
            </div>
            <input style="background-color: #009688;" class="btn btn-success" type="submit" value="Submit"/>
        </form>
        </div>
    </div>
<?php require("../view/templates/footer.php"); ?>