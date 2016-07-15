<?php require("../view/templates/header.php"); ?>
    <div class="container container-center clear-head">
        <div id="error_div" role="alert"><p id="error_par"></p></div>
        <h1 class="clear-head">Sign Up</h1>
        
        <!-- Needs JS implemtation for validating the form variables -->
        <form method="POST" name="signupForm" id="signupForm" action="../controller/signup.php" onsubmit="return validateOwnerForm()">
            <div class="form-group li-margin">
                First Name:
                <input class="form-control" id="fName" required="required" type="text" name="data[fName]"/>
            </div>
            <div class="form-group li-margin">
                LastName:
                <input class="form-control" id="lName" required="required" type="text" name="data[lName]"/>
            </div>
            <div class="form-group li-margin">
                Username:
                <input class="form-control" id="username" required="required" type="text" name="data[username]"/>
            </div>
            <div class="form-group li-margin">
                Password:
                <input class="form-control" id="password" required="required" type="text" name="data[password]"/>
            </div>
            <div class="form-group li-margin">
                Confirm Password:
                <input class="form-control" id="cpassword" required="required" type="text" name="data[cpassword]"/>
            </div>
            <div class="form-group li-margin">
                Email:
                <input class="form-control" id="email" required="required" type="email" name="data[email]"/>
            </div>
            <div class="form-group li-margin">
                Address:
                <input class="form-control" id="address" required="required" type="textarea" name="data[address]"/>
            </div>
            
            <input style="background-color: #009688;" class="btn btn-success" type="submit" value="Submit"/>
        </form>
    </div>
<?php require("../view/templates/footer.php"); ?>