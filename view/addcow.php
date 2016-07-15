<?php require("../view/templates/header.php"); ?>
    <h1 class="container" style="width: 35% ; font-size: 30px;">Add New Cattle To Your Farm</h1>
    <div class="container container-center">
        <br>
        
        <form method="POST" action="../controller/addcow.php">
            <div class="form-group">
                <input class="form-control" type="text" name="cow[name]" placeholder="Name"/>
            </div>
                <div class="form-group">
                    <select class="form-control" name="cow[type]">
                        <option>Type</option>
                        <option>Dairy</option>
                        <option>Dry</option>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" name="cow[breed]">
                        <option>Breed</option>
                        <option>Ayrshire</option>
                        <option>Brown Swiss</option>
                        <option>Busa</option>
                        <option>Canadienne</option>
                        <option>Dairy Shorthorn</option>
                        <option>Dutch Belted</option>
                        <option>Kerry</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">€</div>
                        <input class="form-control" type="number" placeholder="Amount" name="cow[price]"/>
                        <div class="input-group-addon">.00</div>
                    </div>
                </div>
                <div class="form-group">
                    <select class="form-control" name="cow[county]">
                        <option>Counties</option>
                        <option>Cork</option>
                        <option>Waterford</option>
                        <option>Limerick</option>
                        <option>Meath</option>
                        <option>Kerry</option>
                        <option>Kilkenny</option>
                        <option>Mayo</option>
                    </select>
                </div>
                
                <input style="background-color: #009688;" class="btn btn-success" type="submit" name="click" value="Submit"/>
            </form>
    </div>
<?php require("../view/templates/footer.php"); ?>