<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["adminid"];
    $pwd = $_POST["password"];

    $stmt = $conn->prepare("SELECT adminid FROM admin WHERE adminid = ? AND password = ?");
    $stmt->bind_param("ss", $user, $pwd);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION["adminid"] = $user;
        header("Location: ../admin/dashboard.php");
        exit();
    } else {
        header("Location: ../admin/not_found.php");
        exit();
    }
    $stmt->close();
}
$conn->close();
?>