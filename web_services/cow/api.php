<?php 
include("../../model/DBModel.php");
include("../../controller/classes/Cow.php");

header("Content-Type: application/json");

if ($_GET['name'] != "" && $_GET['rating'] != "") {
    $rating = $_GET['rating'];
    $name = $_GET['name'];
    $cow = find_cow_both($name, $rating);
    
    if(empty($cow)){
        deliver_response(404, "cow not found", null);
    } else {
        deliver_response(200, "cow found", $cow);
    }
    
} elseif(!empty($_GET['name'])){
    $name = $_GET['name'];
    $cow = find_cow_names($name);
    if(empty($cow)){
        deliver_response(404, "cow not found", null);
    } else {
        deliver_response(200, "cow found", $cow);
    }
    
} elseif (!empty($_GET['rating'])) {
    $rating = $_GET['rating'];
    $cow = find_cow_ratings($rating);
    
    if(empty($cow)){
        deliver_response(404, "cow not found", null);
    } else {
        deliver_response(200, "cow found", $cow);
    }
 
} elseif (!empty($_GET['cowId'])) {
    $id = $_GET['cowId'];
    $cow = find_cow_id($id);
    
    if(empty($cow)){
        deliver_response(404, "cow not found", null);
    } else {
        deliver_response(200, "cow found", $cow);
    }
 
} else {
    $cow = find_cows();
    deliver_response(200, "cows found", $cow);
}

function find_cows(){
    $dbModel = new DBModel();
    
    // Returns an array of Cow Objects
    $newArray = $dbModel->getCows();
    $otherArray = array();
    
    // Pushes the objects to key values into 
    // the new array.
    foreach($newArray as $cow){
        array_push($otherArray, array(
            "id" => $cow->getCowId(),
            "name" => $cow->getName(),
            "type" => $cow->getType(),
            "breed" => $cow->getBreed(),
            "gender" => $cow->getGender(),
            "ownerId" => $cow->getOwnerId(),
            "price" => $cow->getPrice(),
            "county" => $cow->getCounty(),
            "rating" => $cow->getRating()));
    }
    return $otherArray;
}

function find_cow_id($id){
    $dbModel = new DBModel();
    
    // Returns an array of Cow Objects
    $newArray = $dbModel->getCow($id);
    $otherArray = array();
    
    // Pushes the objects to key values into 
    // the new array.
    foreach($newArray as $cow){
        array_push($otherArray, array(
            "id" => $cow->getCowId(),
            "name" => $cow->getName(),
            "type" => $cow->getType(),
            "breed" => $cow->getBreed(),
            "gender" => $cow->getGender(),
            "ownerId" => $cow->getOwnerId(),
            "price" => $cow->getPrice(),
            "county" => $cow->getCounty(),
            "rating" => $cow->getRating()));
    }
    return $otherArray;
}

function find_cow_ratings($rating){
    $dbModel = new DBModel();
    
    // Returns an array of Cow Objects
    $newArray = $dbModel->getCowRating($rating);
    $otherArray = array();
    
    // Pushes the objects to key values into 
    // the new array.
    foreach($newArray as $cow){
        array_push($otherArray, array(
            "id" => $cow->getCowId(),
            "name" => $cow->getName(),
            "type" => $cow->getType(),
            "breed" => $cow->getBreed(),
            "gender" => $cow->getGender(),
            "ownerId" => $cow->getOwnerId(),
            "price" => $cow->getPrice(),
            "county" => $cow->getCounty(),
            "rating" => $cow->getRating()));
    }
    return $otherArray;
}

function find_cow_names($name){
    $dbModel = new DBModel();
    
    // Returns an array of Cow Objects
    $newArray = $dbModel->getCowNames($name);
    $otherArray = array();
    
    // Pushes the objects to key values into 
    // the new array.
    foreach($newArray as $cow){
        array_push($otherArray, array(
            "id" => $cow->getCowId(),
            "name" => $cow->getName(),
            "type" => $cow->getType(),
            "breed" => $cow->getBreed(),
            "gender" => $cow->getGender(),
            "ownerId" => $cow->getOwnerId(),
            "price" => $cow->getPrice(),
            "county" => $cow->getCounty(),
            "rating" => $cow->getRating()));
    }
    return $otherArray;
}

function find_cow_both($name, $rating){
    $dbModel = new DBModel();
    
    // Returns an array of Cow Objects
    $newArray = $dbModel->getCowBoth($name, $rating);
    $otherArray = array();
    
    // Pushes the objects to key values into 
    // the new array.
    foreach($newArray as $cow){
        array_push($otherArray, array(
            "id" => $cow->getCowId(),
            "name" => $cow->getName(),
            "type" => $cow->getType(),
            "breed" => $cow->getBreed(),
            "gender" => $cow->getGender(),
            "ownerId" => $cow->getOwnerId(),
            "price" => $cow->getPrice(),
            "county" => $cow->getCounty(),
            "rating" => $cow->getRating()));
    }
    return $otherArray;
}

function deliver_response($status, $status_message, $data){
    header("HTTP/1.1 $status $status_message");
    
    $response['status'] = $status;
    $response['status_message'] = $status_message;
    $response['data'] = $data;
    
    $jsonResponse = json_encode($response);
    echo $jsonResponse;
}

?>