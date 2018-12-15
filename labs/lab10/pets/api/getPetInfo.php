<?php


session_start();

$httpMethod = strtoupper($_SERVER['REQUEST_METHOD']);

switch($httpMethod) {
  case "OPTIONS":
    // Allows anyone to hit your API, not just this c9 domain
    header("Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, X-Requested-With, Content-Type, Content-Range, Content-Disposition, Content-Description");
    header("Access-Control-Allow-Methods: POST, GET");
    header("Access-Control-Max-Age: 3600");
    exit();
  case "GET":
    // Allow any client to access
    header("Access-Control-Allow-Origin: *");
    
    http_response_code(401);
    echo "Not Supported";
    
    break;
  case 'POST':
    // Get the body json that was sent
    $rawJsonString = file_get_contents("php://input");

    //var_dump($rawJsonString);

    // Make it a associative array (true, second param)
    $jsonData = json_decode($rawJsonString, true);

    // TODO: do stuff to get the $results which is an associative array
    $data = getPetData($jsonData["pet"]);
    $results = ["statusCode" => "0",
                "data" => $data];

    // Allow any client to access
    header("Access-Control-Allow-Origin: *");
    // Let the client know the format of the data being returned
    header("Content-Type: application/json");

    // Sending back down as JSON
    echo json_encode($results);

    break;
  case 'PUT':
    // Allow any client to access
    header("Access-Control-Allow-Origin: *");
    
    http_response_code(401);
    echo "Not Supported";
    break;
  case 'DELETE':
    // Allow any client to access
    header("Access-Control-Allow-Origin: *");
    
    http_response_code(401);
    break;
}

function getDatabaseConnection() {
    
    //var_dump($_SERVER['SERVER_NAME']);
    if($_SERVER['SERVER_NAME'] =="mikal-cst336-mikal.c9users.io"){
    $host = "localhost";
    $username = "Mikal";
    $password = "847Themikeman"; // best practice: define this in a separte file
    $dbname = "pet_shelter"; 
    
    }else{
       $host = "us-cdbr-iron-east-01.cleardb.net";
    $username = "baa5d52535b2e7";
    $password = "99df1e31"; // best practice: define this in a separte file
    $dbname = "heroku_b659feb23887a6f"; 
        
    } 
    
    // Create connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbConn; 
}

function getData(){
    $dbConn = getDatabaseConnection();
    
    $sql = "SELECT * FROM `pets` WHERE 1";
    $statement = $dbConn->prepare($sql);
    $statement->execute();
    $records = $statement->fetchAll();
    return $records;
}
function getPetData($name){
    $dbConn = getDatabaseConnection();
    
    $sql = "SELECT * FROM `pets` WHERE `name` LIKE '" . $name . "'";
    $statement = $dbConn->prepare($sql);
    $statement->execute();
    $records = $statement->fetchAll();
    return $records;
}

?>