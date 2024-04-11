<?php
require "../vendor/autoload.php";
$con = new MongoDB\Client("mongodb://localhost:27017");
$db = $con->student;
$collection = $db->tbl_stu;
$pipeline = [
    [
        '$group' => [
            '_id' => '$class',
            'totalCourseFee' => ['$sum' => '$course_fee']
        ]
    ]
];
$result = $collection->aggregate($pipeline)->toArray();
foreach ($result as $class) {
    echo "Class: " . $class['_id'] . ", Total Course Fee: " . $class['totalCourseFee'] . "\n";
}
?>
