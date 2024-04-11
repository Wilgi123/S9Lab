<?php
require "../vendor/autoload.php";

// Connect to MongoDB
$con = new MongoDB\Client("mongodb://localhost:27017");
$db = $con->db;
$collection = $db->tbl_reg;

// Check if ID parameter is set
if (isset($_GET['id'])) {
    // Retrieve the document based on the ID
    $id = $_GET['id'];
    $document = $collection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);

    // Check if document exists
    if ($document) {
        // Initialize variables with existing data
        $username = $document['username'];
        $email = $document['email'];
        $password = $document['password'];

        // Check if the form is submitted
        if (isset($_POST['submit'])) {
            // Get new data from the form
            $newUsername = $_POST['username'];
            $newEmail = $_POST['email'];
            $newPassword = $_POST['password'];

            // Update the document in the database
            $updateResult = $collection->updateOne(
                ['_id' => new MongoDB\BSON\ObjectId($id)],
                ['$set' => [
                    'username' => $newUsername,
                    'email' => $newEmail,
                    'password' => $newPassword
                ]]
            );

            // Check if update was successful
            if ($updateResult->getModifiedCount() > 0) {
                echo "<script>alert('Data updated successfully.');</script>";
                header("Location: display_data.php");
            } else {
                echo "<script>alert('Failed to update data.');</script>";
                header("Location: display_data.php");
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
    <title>Update Data</title>
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
    input[type="text"],
    input[type="password"] {
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
    }

    /* Style for submit button on hover */
    input[type="submit"]:hover {
        background-color: #45a049; /* Darker green background on hover */
       
    }
</style>


<body>
    <h2 align="center">Update Data</h2>
    <div class="container">
    <form action="#" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo $username; ?>" required><br><br>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?php echo $email; ?>" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="<?php echo $password; ?>" required><br><br>

        <input type="submit" name="submit" value="Update">
    </form>
</div>
</body>

</html>