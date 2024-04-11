<?php
require "../vendor/autoload.php";
$con = new MongoDB\Client("mongodb://localhost:27017");
$db = $con->student;
$collection = $db->tbl_stu;
$pipeline = [
    [
        '$sort' => ['course_fee' => -1]
    ],
    [
        '$group' => [
            '_id' => '$class',
            'highestFeeStudent' => ['$first' => '$$ROOT']
        ]
    ],
    [
        '$project' => [
            'class' => '$_id',
            'student_id' => '$highestFeeStudent.student_id',
            'course_fee' => '$highestFeeStudent.course_fee'
        ]
    ]
];
$result = $collection->aggregate($pipeline)->toArray();
foreach ($result as $class) {
    echo "Class: " . $class['class'] . ", Student ID: " . $class['student_id'] . ", Highest Course Fee: " . $class['course_fee'] . "\n";
}
?>
