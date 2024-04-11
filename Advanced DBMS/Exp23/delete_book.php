<?php
require "../vendor/autoload.php";

// Connect to MongoDB
$con = new MongoDB\Client("mongodb://localhost:27017");
$bookdb = $con->bookdb;
$collection = $bookdb->tbl_book;

// Check if ID parameter is set
if (isset($_GET['id'])) {
    // Retrieve the ID from the URL parameters
    $id = $_GET['id'];
    // Convert ID to MongoDB ObjectId
    $objectId = new MongoDB\BSON\ObjectId($id);

    // Delete the document from the collection
    $deleteResult = $collection->deleteOne(['_id' => $objectId]);

    // Check if deletion was successful
    if ($deleteResult->getDeletedCount() > 0) {
        echo "<script>alert('Data deleted successfully.');</script>";
        header("Location: display_book.php");
    } else {
        echo "<script>alert('Failed to delete data.');</script>";
        header("Location: display_book.php");
    }

}
?>
