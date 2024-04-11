<?php
    require_once "../vendor/autoload.php";

    if (isset($_POST['submit'])) {
        $con = new MongoDB\Client("mongodb://localhost:27017");
        $bookdb = $con->selectDatabase('bookdb');
        $collection = $bookdb->tbl_book; 

        $title = $_POST['title'];
        $author = $_POST['author'];
        $genre = $_POST['genre'];
        $price = $_POST['price'];
        $qnt = $_POST['qnt'];

        $document = [
            'title' => $title,
            'author' => $author,
            'genre' => $genre,
            'price' => $price,
            'qnt' => $qnt
        ];

        $result = $collection->insertOne($document);

        if ($result->getInsertedCount() > 0) {
            echo "<script>alert('Data inserted successfully.');
            window.location.href='display_book.php';</script>";
            exit;
        } else {
            echo "<script>alert('Failed to insert data.');
            window.location.href='display_book.php';</script>";
            exit;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book Details Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input[type="text"],input[type="number"]{
            width: calc(100% - 22px);
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .form-group input[type="submit"] {
            background-color: #4CAF50; /* Green background */
            color: #fff;
            border: none;
            padding: 10px 0;
            width: 100%;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
        }
        .form-group input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <h2>Add Book Details</h2>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="author">Author:</label>
                <input type="text" id="author" name="author" required>
            </div>
            <div class="form-group">
                <label for="genre">Genre:</label>
                <input type="text" id="genre" name="genre" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" id="price" name="price" required>
            </div>
            <div class="form-group">
                <label for="qnt">Quantity:</label>
                <input type="number" id="qnt" name="qnt" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Submit" name="submit">
            </div>
        </form>
    </div>
</body>
</html>
