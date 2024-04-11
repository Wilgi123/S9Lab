<?php
require "../vendor/autoload.php";
$con = new MongoDB\Client("mongodb://localhost:27017");
$bookdb = $con->bookdb;
$collection = $bookdb->tbl_book;

$cursor = $collection->find();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
            text-align: left;
        }

        td {
            text-align: left;
        }

        .btn-group {
            display: flex;
        }

        .btn {
            margin-right: 5px;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }

        .btn-update {
            background-color: #007bff;
            color: #fff;
        }

        .btn-delete {
            background-color: #dc3545;
            color: #fff;
        }
        .btn-add {
            background-color: #28a745; /* Green background */
            color: white; /* White text color */
            padding: 10px 20px; /* Add padding */
            border: none; /* Remove border */
            cursor: pointer; /* Add pointer cursor on hover */
            text-decoration: none; /* Remove underline */
            border-radius: 5px; /* Add rounded corners */
            transition: background-color 0.3s; /* Smooth transition on hover */
        }

    </style>
</head>

<body>
    <h1 align="center" style="color: red;">Book Price less than Rs.230</h1>
    
    <table>
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Genre</th>
            <th>Price</th>
            <th>Quantity</th>
            <th colspan="2">Operations</th>
        </tr>
        <?php foreach ($cursor as $document) :
            if ($document['price'] <= 230) { ?>
                <tr>
                    <td><?php echo $document['title']; ?></td>
                    <td><?php echo $document['author']; ?></td>
                    <td><?php echo $document['genre']; ?></td>
                    <td><?php echo $document['price']; ?></td>
                    <td><?php echo $document['qnt']; ?></td>
                    <td class="btn-group">
                    <a href="update_book.php?id=<?php echo $document['_id']; ?>" class="btn btn-update" >Update</a>
                </td>
                <td >
                    <a href="delete_book.php?id=<?php echo $document['_id']; ?>" class="btn btn-delete">Delete</a>
                </td>
                </tr>
            <?php } ?>
        <?php endforeach; ?>
    </table>
    <div style="margin-top: 20px; text-align: center;">
        <a href="add_book.php" class="btn btn-add">ADD BOOK</a>
    </div><br>
   
</body>
</html>
