<?php
require "../vendor/autoload.php";
$con = new MongoDB\Client("mongodb://localhost:27017");
$db = $con->student;
$collection = $db->tbl_stu;
$pipeline = [
    [
        '$match' => ['section' => 'A']
    ],
    [
        '$group' => [
            '_id' => null,
            'totalCourseFee' => ['$sum' => '$course_fee']
        ]
    ]
];
$result = $collection->aggregate($pipeline)->toArray();
$sectionACourseFee = !empty($result) ? $result[0]['totalCourseFee'] : 0;
echo "Total course fee of all students in Section A: " . $sectionACourseFee;
?>
