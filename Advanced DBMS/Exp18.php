<?php
require "./vendor/autoload.php";

// Establish connection
$con = new MongoDB\Client("mongodb://localhost:27017");
$db = $con->admin;
echo "Display Data Form Database<br>\n \n<br>";

// Access collection
$collection = $db->sample;

// Retrieve data from collection
$cursor = $collection->find();

// Output retrieved documents
foreach ($cursor as $document) {
    // Process each document as needed
    echo "Name: " . $document['Name'] . "<br>"." Age: " . $document['Age'] ."<br>". " Email: " . $document['E-mail'] . "<hr>";
}
?>
