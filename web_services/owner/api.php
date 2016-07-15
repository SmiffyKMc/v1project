<?php 

class Cow{
    private $rating = 0.0;
    private $name = "";
    
    function __construct($name, $rating){
        $this->name = $name;
        $this->rating = $rating;
    }
    
    function getName(){
        return $this->name;
    }
    
    function getRating(){
        return $this->rating;
    }
}

header("Content-Type: application/json");

if(!empty($_GET['name'])){
    $name = $_GET['name'];
    $cow = find_cow($name);
    
    if(empty($cow)){
        deliver_response(400, "cow not found", null);
    } else {
        deliver_response(200, "cow found", $cow);
    }
} else {
    $cow = find_cows();
    deliver_response(200, "cows found", $cow);
}

function find_cow($name){
    $varArray = array(
    new Cow("Kieran", 4.3),
    new Cow("Sally", 2.0),
    new Cow("Dec", 3.7));
    
    foreach($varArray as $cow){
        if($cow->getName() == $name){
            return array(
                "name" => $cow->getName(),
                "rating" => $cow->getRating());
            break;
        }
    }
}

function find_cows(){
    $varArray = array(
    new Cow("Kieran", 4.3),
    new Cow("Sally", 2.0),
    new Cow("Dec", 3.7));
    
    $newArray = array(); 
    
    foreach($varArray as $cow){
       array_push($newArray, array(
                "name" => $cow->getName(),
                "rating" => $cow->getRating()));
    }
    
    return $newArray;
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