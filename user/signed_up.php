<?php
include '../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $idproof = $_POST["idproof"];
    $dob = $_POST["dob"];
    
    $stmt = $conn->prepare("INSERT INTO user_login (phone, password, name, email, idproof, dob) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $phone, $password, $name, $email, $idproof, $dob);
    
    if ($stmt->execute()) {
        header("Location: created.php");
        exit();
    } else {
        header("Location: not_created.php");
        exit();
    }
    
    $stmt->close();
}
$conn->close();
?>