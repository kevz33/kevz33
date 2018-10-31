<?php
function getDatabaseConnection() {
    
    if ($_SERVER['SERVER_NAME'] == "cst336-fall-2018-uuts.c9users.io") { // running on cloud9
        $host = "localhost";
        $username = "kevin";
        $password = "cst300"; // best practice: define this in a separte file
        $dbname = "meme_lab"; 
    } else {
        // running on Heroku
        $host = "us-cdbr-iron-east-01.cleardb.net";
        $username = "b9cbc73240e743";
        $password = "77c3fe4b"; // best practice: define this in a separte file
        $dbname = "heroku_283a8a672d0d92d"; 
    }
    
    // Create connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbConn; 
}

// temporary test code
//$dbConn = getDatabaseConnection(); 

echo "SERVER!!!!!!!!!!!!!!!!!! <br/>"; 
echo $_SERVER['SERVER_NAME'];
echo "<br>"; 

?>
