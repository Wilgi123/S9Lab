<?php
require "../vendor/autoload.php";
$con = new MongoDB\Client("mongodb://localhost:27017");
$db = $con->student;
$collection = $db->tbl_stu;
$pipelineCountStudents = [
    [
        '$group' => [
            '_id' => '$class',
            'count' => ['$sum' => 1]
        ]
    ]
];
$resultCountStudents = $collection->aggregate($pipelineCountStudents)->toArray();
foreach ($resultCountStudents as $class) {
    echo "Class: " . $class['_id'] . ", Number of Students: " . $class['count'] . "\n";
}
?>
