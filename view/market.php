<?php 
    include("../model/DBModel.php");
    include("../controller/classes/Cow.php");
    
    $dbController = new DBModel();
?>

<?php require("../view/templates/header.php"); ?>
    <div class="container">
        <h1>Cattle Market</h1>
        <h3>Search for Cattle all around Ireland!</h3>
        <br>
        
        <form class="form-inline" role="form">
            <div class="form-group">
            <input style="width: 80px;" class="form-control" type="text" id="nameVar" placeholder="Rating"/>
            <input style="width: 100px;" class="form-control" type="text" id="name" placeholder="Name"/>
            <input type="submit" class="btn btn-success" value="Submit" id="marketFormButton"/>
            </div>
        </form>
        
        <table id="marketTable" class="table table-striped">
            <tr>
                <th style="text-align: left;">Type</th>
                <th style="text-align: left;">Breed</th>
                <th style="text-align: left;">Gender</th>
                <th style="text-align: left;">Name</th>
                <th style="text-align: left;">Price €</th>
                <th style="text-align: left;">County</th>
                <th style="text-align: left;">Rating</th>
                <th style="text-align: left;">Check Cow</th>
            </tr>
        </table>
        
        <div id="map"></div>
    </div>
    <script>
        function initMap() {
          var mapDiv = document.getElementById('map');
          var map = new google.maps.Map(mapDiv, {
              center: {lat: 51.8869296, lng: -8.6204369},
              zoom: 15
          });
        }
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD13KsJyDzMvVGbm4NQCaiV40sIa9Q4VQQ&callback=initMap">
    </script>
<?php require("../view/templates/footer.php"); ?>