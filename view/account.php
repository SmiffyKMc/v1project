<?php
    session_start();
    
    include("../model/DBModel.php");
    include("../controller/classes/Owner.php");
    // SESSION ID = $_SESSION["ownerId"];
    
    if($_SESSION["username"] == null){
        // Redirect if the user isn't logged in.
        header('Location: https://workspace-smiffykmc.c9users.io/V1Project/v2/view/login.php');
    } else {
        $dbModel = new DBModel();
        $ownerArray = $dbModel->getOwner($_SESSION["username"]);
    }
?>

<?php require("../view/templates/header.php"); ?>
    <div class="container">
        <h1>Account Page</h1>
        <h2>Welcome <?php echo $_SESSION["username"] ?></h2>
        <div style="margin-top: 70px; margin-bottom: 50p;" class="row">
            <div class="col-sm-4 col-md-4">
                <a href="addcow.php">
                    <img class="img-holders img-responsive" src="http://i.istockimg.com/file_thumbview_approve/55765602/5/stock-illustration-55765602-cow-and-calf.jpg">
                    <p class="text-center">Add Cattle</p>
                </a>
            </div>
            <div class="col-sm-4 col-md-4">
                <a href="market.php">
                    <img class="img-holders img-responsive" src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcQQ0TdLndEPkoLPds2-QLIUp7el4BpHAgyfgw4yjh-kKVQQ9hI3MA">
                    <p class="text-center">Check out the Cattle Market</p>
                </a>
                
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
                <a href="cattle.php">
                    <img class="img-holders img-responsive" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTTFZCPYf92IG5TivyvQZmNxctX0ZyYf-CF0_96wXPkCwCjVY9RiQ">
                    <p class="text-center">Show Cattle</p>
                </a>
            </div>
        </div>
    </div>
<?php require("../view/templates/footer.php"); ?>