<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define("ROOT", dirname(dirname(dirname(__FILE__, 2))));
require_once ROOT . '/admin/connect.php';

if (!isset($_GET['id_number'])) {
    header('location: ../student-list.php?success=false');
} else {
    $conn = $link;

    $sql = "DELETE FROM `student_accounts` WHERE id_number= '{$_GET['id_number']}'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Delete Success!')</script>";
        header('location: ../student-list.php?success=True');
    } else {
        header('location: ../student-list.php?success=Failed');
    }
    
}
