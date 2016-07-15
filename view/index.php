<?php 
    session_start();
    
    if(!$_SESSION["username"] == null){
        header('Location: https://workspace-smiffykmc.c9users.io/V1Project/v2/view/account.php');
    }
?>
<?php require("../view/templates/header.php"); ?>
    <div class="container">
        <div class="jumbotron" style="margin-bottom: 100px;">
            <h2>Welcome to the National Agricultural Farmers Hub.</h2>
            <p>The site where you can control your cattle and keep an eye on the markets.</p>
        </div>
        <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 80px;">
            <div class="col-md-4">
                <img class="img-holders img-thumbnail" 
                src="data:image/jpeg;base64,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">
                <h3>Cattle Market</h3>
                <p>Find the best cattle for your farm in the comfort of your own home. 
                    Or from the palm of your hand.</p>
            </div>
            <div class="col-md-4">
                <img class="img-holders img-thumbnail" src="http://ezoic-site-content.s3.amazonaws.com/blog/wp-content/uploads/2016/03/user-experience.jpg">
                <h3>Your Account</h3>
                <p>Control your account from checking your cattle, showing you a specific 
                    cow on your farm or even add a new one to the family.</p>
            </div>
            <div class="col-md-4">
                <img class="img-holders img-thumbnail" src="http://www.zeendo.com/info/wp-content/uploads/2013/10/devices-540x271.png">
                <h3>The HUB On The Go</h3>
                <p>Need to get out of the house and need to check your acount? Perfectly fine. The Hub is 
                    responsive and you can access your account easly on your handheld device or tablet.</p>
            </div>
            <p id="jsontest"></p>
        </div>
    </div>
<?php require("../view/templates/footer.php"); ?>