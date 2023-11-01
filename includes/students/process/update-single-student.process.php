<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define("ROOT", dirname(dirname(dirname(__FILE__, 2))));
require_once ROOT . '/admin/connect.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $input = file_get_contents("php://input");
    $post = json_decode($input, true);

    $idNumber = $post['idNumber'];
    $firstName = empty($post['firstName']) ? '' : ucwords($post['firstName']);
    $middleName = empty($post['middleName']) ? '' : ucwords($post['middleName']);
    $lastName = empty($post['lastName']) ? '' : ucwords($post['lastName']);
    $department = empty($post['department']) ? '' : ucwords($post['department']);
    $course = empty($post['course']) ? '' : ucwords($post['course']);
    $year = empty($post['year']) ? '' : ucwords($post['year']);
    $section = empty($post['section']) ? '' : ucwords($post['section']);
    $mobileNumber = empty($post['mobileNumber']) ? '' : $post['mobileNumber'];
    $conn = $link;

    $sql = "UPDATE `student_accounts` SET `first_name`= '{$firstName}', `middle_name` = '{$middleName}', `last_name` = '{$lastName}', `department` = '{$department}', `course` = '{$course}', `year` = '{$year}', `section` = '{$section}', `mobile_number` = '{$mobileNumber}' WHERE id_number = '{$idNumber}'";

    if ($conn->query($sql) === TRUE) {
        echo json_encode([
            "ok" => true,
            
        ]);
    } else {
        echo json_encode([
            "ok" => false
        ]);
    }

    $conn->close();
    
}
