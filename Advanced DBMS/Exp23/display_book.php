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
        table {
            width: 100%;
            border-collapse: collapse;

        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
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

        .btn-add:hover {
            background-color: #218838; /* Darker green background on hover */
        }
    </style>
</head>

<body>
    <h1 align="center" style="color: red;">Display Book Details</h1>
    <table>
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Genre</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Update Operation</th>
            <th>Delete Operation</th>
        </tr>
        <?php foreach ($cursor as $document) : ?>
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
        <?php endforeach; ?>
    </table>
    <div style="margin-top: 20px; text-align: center;">
        <a href="add_book.php" class="btn btn-add">ADD BOOK</a>
    </div><br>
    <div style="margin-top: 20px; text-align: center;">
    <a href="books_low_in_stock.php" class="btn btn-info" style="margin-right: 10px; background-color: #ffc107; color: #fff; text-decoration: none; padding: 10px 20px; border-radius: 5px;">Books Low in Stock</a>
    <a href="books_price_less_than.php" class="btn btn-info" style="background-color: #17a2b8; color: #fff; text-decoration: none; padding: 10px 20px; border-radius: 5px;">Books with Price Less Than</a>
</div>
</body>

</html>