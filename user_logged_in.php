<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = $_POST["phone"];
    $pwd = $_POST["password"];

    $stmt = $conn->prepare("SELECT phone, password, name, email, idproof, dob FROM user_login WHERE phone = ? AND password = ?");
    $stmt->bind_param("ss", $phone, $pwd);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // Store user data in session instead of temp_session table
        $_SESSION["user_phone"] = $row["phone"];
        $_SESSION["user_name"] = $row["name"];
        $_SESSION["user_email"] = $row["email"];
        $_SESSION["user_idproof"] = $row["idproof"];
        $_SESSION["user_dob"] = $row["dob"];
        
        header("Location: user_view.php");
        exit();
    } else {
        header("Location: user_not_found.php");
        exit();
    }
    $stmt->close();
}
$conn->close();
?>