<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define("ROOT", dirname(dirname(dirname(__FILE__, 2))));
require_once ROOT . '/admin/connect.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $input = file_get_contents("php://input");
    $post = json_decode($input, true);

    $idNumber = generateRandomString();
    $firstName = empty($post['firstName']) ? '' : ucwords($post['firstName']);
    $middleName = empty($post['middleName']) ? '' : ucwords($post['middleName']);
    $lastName = empty($post['lastName']) ? '' : ucwords($post['lastName']);
    $department = empty($post['department']) ? '' : ucwords($post['department']);
    $course = empty($post['course']) ? '' : ucwords($post['course']);
    $year = empty($post['year']) ? '' : ucwords($post['year']);
    $section = empty($post['section']) ? '' : ucwords($post['section']);
    $mobileNumber = empty($post['mobileNumber']) ? '' : $post['mobileNumber'];
    $conn = $link;

    $sql = "INSERT INTO `student_accounts`( `id_number`, `first_name`, `middle_name`, `last_name`, `department`, `course`, `year`, `section`, `mobile_number`) VALUES ('{$idNumber}', '{$firstName}', '{$middleName}', '{$lastName}', '{$department}', '{$course}', '{$year}', '{$section}', '{$mobileNumber}')";

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
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}