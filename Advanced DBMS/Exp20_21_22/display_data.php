<?php
require "../vendor/autoload.php";
$con = new MongoDB\Client("mongodb://localhost:27017");
$db = $con->db;
$collection = $db->tbl_reg;

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
    </style>
</head>

<body>
    <h2>Inserted Data</h2>
    <table>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Update Operation</th>
            <th>Delete Operation</th>
        </tr>
        <?php foreach ($cursor as $document) : ?>
            <tr>
                <td><?php echo $document['username']; ?></td>
                <td><?php echo $document['email']; ?></td>
                <td><?php echo $document['password']; ?></td>
                <td class="btn-group">
                    <a href="update.php?id=<?php echo $document['_id']; ?>" class="btn btn-update" >Update</a>
                </td>
                <td >
                    <a href="delete.php?id=<?php echo $document['_id']; ?>" class="btn btn-delete">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>