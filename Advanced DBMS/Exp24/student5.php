<?php
require "../vendor/autoload.php";
$con = new MongoDB\Client("mongodb://localhost:27017");
$db = $con->student;
$collection = $db->tbl_stu;
$pipelineHighestTotalFee = [
    [
        '$group' => [
            '_id' => '$class',
            'totalCourseFee' => ['$sum' => '$course_fee']
        ]
    ],
    [
        '$sort' => ['totalCourseFee' => -1]
    ],
    [
        '$limit' => 1
    ]
];
$resultHighestTotalFee = $collection->aggregate($pipelineHighestTotalFee)->toArray();
echo "Class with highest total course fee: " . $resultHighestTotalFee[0]['_id'] . "\n";
?>
