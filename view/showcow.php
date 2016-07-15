<?php 
    include('../controller/classes/Cow.php');
    include('../controller/classes/Owner.php');
    include('../model/DBModel.php');
    
    $cowId;
    $cowObj = null;
    $ownerObj = null;

    if(isset($_GET["cowId"])){
        $cowId = $_GET["cowId"];
    } else {
        echo "No cow with that ID";
    }
    
    function findCow($cowId){
        global $cowObj;
        $dbModel = new DBModel();
        $cow = $dbModel->getCow($cowId);
        $cowObj = new Cow(
            $cowId,
            $cow[0]->getType(),
            $cow[0]->getBreed(), 
            $cow[0]->getGender(),
            $cow[0]->getName(), 
            $cow[0]->getOwnerId(),
            $cow[0]->getPrice(),
            $cow[0]->getCounty(),
            $cow[0]->getRating());
    }
    
    function showOwner($ownerID){
        global $ownerObj;
        $fName = "";
        $lName = "";
        $email = ""; 
        
        $dbModel = new DBModel();
        $owner = $dbModel->getOwnerFromID($ownerID);
        $fName = $owner[1];
        $lName = $owner[2];
        $email = $owner[4];
        echo "<h3>Owner: " . $fName .  " " . $lName . "</h3>";
        echo "<h3>Email: " . $email . "</h3>";
    }
?>
<?php require("../view/templates/header.php"); ?>

    <div class="container">
        <div class="row" style="margin-bottom: 50px;">
            <div class="col-md-4">
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">Cattle Information</div>
                        
                        <?php findCow($cowId); ?>
                        
                        <div class="panel-body">
                            <h1 id="name"></h1>
                            <h3 id="type"></h3>
                            <h3 id="breed"></h3>
                            <h3 id="gender"></h3>
                            <h3 id="price"></h3>
                            <h3 id="county"></h3>
                            <h3 id="rating"></h3><br>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">Owner Information</div>
                        <div class="panel-body"><?php showOwner($cowObj->getOwnerId()); ?></div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Cow Image</div>
                    <div class="panel-body" style="padding: 0;">
                        <img class="img-responsive" id="cow-img" src="http://www.dutchbelted.com/Best%20Yet%20Universal.jpg">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    window.onload = function(){
        var id = getParams();
    }
    
    function getParams(){
        var queryStr = window.location.search;
        var paramPairs = queryStr.substr(1).split('&');
        
        var params = {};
        for (var i = 0; i < paramPairs.length; i++) {
            var parts = paramPairs[i].split('=');
            params[parts[0]] = parts[1];
        }
        
        showCowId(params.cowId);
    }
    
    function showCowId(id){
            $.ajax({
                    type: "GET",
                    url: "../web_services/cow/api.php",
                    data: {"cowId" : id},
                    contentType: "application/json; charset=utf-8",
                    cache : false,
                    dataType: "json",
                    success: function(data) {
                        var trText = "";
                        $.each(data.data, function(name, value){
                            console.log(value);
                            $("#name").text("Name: " + value.name);
                            $("#type").text("Type: " + value.type);
                            $("#breed").text("Breed: " + value.breed);
                            $("#gender").text("Gender: " + value.gender);
                            $("#price").text("Price: €" + value.price);
                            $("#county").text("County: " + value.county);
                            $("#rating").text("Rating: " + value.rating + " Stars");
                        });
                    },
                    error: function(){
                       alert("There was an error loggin in");
                    }
            });
        }
</script>
<?php require("../view/templates/footer.php"); ?>