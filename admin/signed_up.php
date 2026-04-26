<?php
include '../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["adminid"];
    $pwd = $_POST["password"];
    $empid = $_POST["empid"];

    $stmt = $conn->prepare("INSERT INTO admin(adminid, password, empid) VALUES(?, ?, ?)");
    $stmt->bind_param("sss", $user, $pwd, $empid);
    
    if($stmt->execute() === TRUE) {
        header("Location: signed_up1.php");
    } else {
        header("Location: signed_up2.php");
    }
    $stmt->close();
}
$conn->close();
?>