<?php
require "../vendor/autoload.php";

// Connect to MongoDB
$con = new MongoDB\Client("mongodb://localhost:27017");

// Select the database and collection
$db = $con->student;
$collection = $db->tbl_stu;

// Aggregate pipeline to calculate total course fee for each section and sort the result in descending order
$pipeline = [
    [
        '$group' => [
            '_id' => '$section',
            'totalCourseFee' => ['$sum' => '$course_fee']
        ]
    ],
    [
        '$sort' => ['totalCourseFee' => -1]
    ]
];

// Execute the aggregation query
$result = $collection->aggregate($pipeline)->toArray();

// Display the result
foreach ($result as $section) {
    echo "Section: " . $section['_id'] . ", Total Course Fee: " . $section['totalCourseFee'] . "\n";
}
?>
