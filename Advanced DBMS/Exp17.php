<?php
require "./vendor/autoload.php";

// Establish connection
$con = new MongoDB\Client("mongodb://localhost:27017");
$db = $con->admin;
echo "Connection successful<br>\n ";

// Access collection
$collection = $db->sample;

// Define array of documents
$docs = array(
    array('Name' => 'arya', 'Age' => 22, 'E-mail' => 'arya@gmail.com'),
    array('Name' => 'jon', 'Age' => 25, 'E-mail' => 'jon@example.com'),
    array('Name' => 'sansa', 'Age' => 23, 'E-mail' => 'sansa@example.com')
);

// Insert multiple documents
$result = $collection->insertMany($docs);

echo "\nDocuments inserted successfully";
?>
