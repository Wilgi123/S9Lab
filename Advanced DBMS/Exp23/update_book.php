<?php
require_once "../vendor/autoload.php";

// Connect to MongoDB
$con = new MongoDB\Client("mongodb://localhost:27017");
$bookdb = $con->selectDatabase('bookdb');
$collection = $bookdb->tbl_book;

// Check if ID parameter is set
if (isset($_GET['id'])) {
    // Retrieve the document based on the ID
    $id = $_GET['id'];
    $document = $collection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);

    // Check if document exists
    if ($document) {
        // Initialize variables with existing data
        $title = $document['title'];
        $author = $document['author'];
        $genre = $document['genre'];
        $price = $document['price'];
        $qnt = $document['qnt'];

        // Check if the form is submitted
        if (isset($_POST['submit'])) {
            // Get new data from the form
            $newTitle = $_POST['title'];
            $newAuthor = $_POST['author'];
            $newGenre = $_POST['genre'];
            $newPrice = $_POST['price'];
            $newQnt = $_POST['qnt'];

            // Update the document in the database
            $updateResult = $collection->updateOne(
                ['_id' => new MongoDB\BSON\ObjectId($id)],
                ['$set' => [
                    'title' => $newTitle,
                    'author' => $newAuthor,
                    'genre' => $newGenre,
                    'price' => $newPrice,
                    'qnt' => $newQnt
                ]]
            );

            // Check if update was successful
            if ($updateResult->getModifiedCount() > 0) {
                echo "<script>alert('Data updated successfully.'); window.location.href='display_book.php';</script>";
                exit;
            } else {
                echo "<script>alert('Failed to update data.'); window.location.href='display_book.php';</script>";
                exit;
            }
        }
    } else {
        echo "Document not found.";
    }
} else {
    echo "ID parameter not set.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Book Details</title>
</head>

<style>
    .container {
        width: 50%; /* Set the width of the container */
        margin: 0 auto; /* Center the container horizontally */
    }

    /* Style for labels */
    label {
        display: block; /* Place each label on a new line */
        margin-bottom: 5px; /* Add space between labels */
    }

    /* Style for input fields */
    input[type="text"],input[type="number"] {
        width: 100%; /* Make inputs full width */
        padding: 8px; /* Add some padding */
        margin-bottom: 10px; /* Add space between input fields */
        box-sizing: border-box; /* Include padding and border in the element's total width and height */
    }

    /* Style for submit button */
    input[type="submit"] {
        background-color: #4CAF50; /* Green background */
        color: white; /* White text color */
        padding: 10px 20px; /* Add padding */
        border: none; /* Remove border */
        cursor: pointer; /* Add pointer cursor on hover */
        width: 100%;
    }

    /* Style for submit button on hover */
    input[type="submit"]:hover {
        background-color: #45a049; /* Darker green background on hover */
       
    }
</style>


<body>
    <h1 align="center" style="color: red;">Update Data</h1>

    <div class="container">
    <form action="#" method="POST">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?php echo $title; ?>" required><br><br>

            <label for="author">Author:</label>
            <input type="text" id="author" name="author" value="<?php echo $author; ?>" required><br><br>

            <label for="genre">Genre:</label>
            <input type="text" id="genre" name="genre" value="<?php echo $genre; ?>" required><br><br>

            <label for="price">Price:</label>
            <input type="text" id="price" name="price" value="<?php echo $price; ?>" required><br><br>

            <label for="qnt">Quantity:</label>
            <input type="number" id="qnt" name="qnt" value="<?php echo $qnt; ?>" required><br><br>

            <input type="submit" name="submit" value="UPDATE">
        </form>
</div>
</body>

</html>