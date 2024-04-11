<?php
    require "../vendor/autoload.php";
    $con = new MongoDB\Client("mongodb://localhost:27017");
    $db = $con->student;
    $collection = $db->tbl_stu;
    $documents = [
        [
            "student_id" => "P0004",
            "class" => 103,
            "section" => "B",
            "course_fee" => 19
        ],
        [
            "student_id" => "P0002",
            "class" => 102,
            "section" => "A",
            "course_fee" => 8
        ],
        [
            "student_id" => "P0002",
            "class" => 101,
            "section" => "A",
            "course_fee" => 12
        ],
        [
            "student_id" => "P0005",
            "class" => 104,
            "section" => "C",
            "course_fee" => 25
        ],
    ];
    $insertResult = $collection->insertMany($documents);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Data</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Student Data</h2>
    <table>
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Class</th>
                <th>Section</th>
                <th>Course Fee</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $cursor = $collection->find();
                foreach ($cursor as $document) {
                    echo "<tr>";
                    echo "<td>" . $document['student_id'] . "</td>";
                    echo "<td>" . $document['class'] . "</td>";
                    echo "<td>" . $document['section'] . "</td>";
                    echo "<td>" . $document['course_fee'] . "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>
