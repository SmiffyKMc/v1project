<?php
    session_start();

    include("../model/DBModel.php");
    include("../controller/classes/Cow.php");
    
    if($_SESSION["username"] == null){
        // Redirect if the user isn't logged in.
        header('Location: https://workspace-smiffykmc.c9users.io/V1Project/v2/view/login.html');
    }
    
    function showCattle(){
        $dbModel = new DBModel();
        $cattle = $dbModel->getCattle($_SESSION['ownerId']);
        $var = 0;
        foreach($cattle as $cow){
            $cowId = $cow->getCowId();
            echo "<tr>";
            echo "<td>" . ++$var . "</td>";
            echo "<td>";
            echo "<a href='showcow.php?cowId=$cowId'>";
            echo "Name: " . $cow->getName() . " ";
            echo "Type: " . $cow->getType() . " ";
            echo "Breed: " . $cow->getBreed() . " ";
            echo "Gender: " . $cow->getGender() . " ";
            echo "Price: " . $cow->getPrice() . " ";
            echo "County: " . $cow->getCounty() . " ";
            //echo "<br><br>";
            echo "</a>";
            echo "</td>";
            echo "</tr>";
        }
    }

?>

<?php require("../view/templates/header.php"); ?>
    <div class="container">
        <h1>Your Cattle</h1>
        <table class="table">
            <?php showCattle(); ?>
        </table>
    </div>
<?php require("../view/templates/footer.php"); ?>