<?php
require "./vendor/autoload.php";
$con=new MongoDB\client( "mongodb://localhost:27017");
$db=$con->admin;
echo "connection successful<br>\n ";
$collection = $db->sample;
$doc=array('Name'=>'arya','Age'=>22,'E-mail'=>'arya@gmail.com');
$collection->insertOne($doc);
echo "\ninserted successfully";
?>
