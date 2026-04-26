<?php
session_start();
if (!isset($_SESSION["user_phone"])) {
    header("Location: ../user/login.php");
    exit();
}
include '../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $room = $_POST["rooms"];
    $checkin = $_POST["checkin"];
    $checkout = $_POST["checkout"];
    $ac = isset($_POST["ac"]) ? "true" : "false";
    $breakfast = isset($_POST["breakfast"]) ? "true" : "false";
    $lunch = isset($_POST["lunch"]) ? "true" : "false";
    $snacks = isset($_POST["snacks"]) ? "true" : "false";
    $dinner = isset($_POST["dinner"]) ? "true" : "false";
    $swimming = isset($_POST["swimming"]) ? "true" : "false";
    
    $in = strtotime($checkin);
    $out = strtotime($checkout);
    $diff = abs($out - $in); 
    $days = floor($diff / (60*60*24));
    
    if($days <= 0) $days = 1;

    $phone = $_SESSION["user_phone"];
    $name = $_SESSION["user_name"];
    $idproof = $_SESSION["user_idproof"];
    $status = "Waiting";
    $price = 0;
    
    if ($room == "Single bed") {
        $price = 1000;
    } else if ($room == "Double bed") {
        $price = 1800;
    } else if ($room == "Four bed") {
        $price = 3000;
    }
    
    $price = $price * $days;
    $additional = 0;
    
    if ($ac == "true") $additional += 300;
    if ($breakfast == "true") $additional += 150;
    if ($lunch == "true") $additional += 300;
    if ($snacks == "true") $additional += 120;
    if ($dinner == "true") $additional += 250;
    if ($swimming == "true") $additional += 300;
    
    $price = $price + ($days * $additional);

    // Get booking ID and increment
    $conn->query("UPDATE book_id SET book_id = book_id + 1");
    $result = $conn->query("SELECT book_id FROM book_id");
    $row = $result->fetch_assoc();
    $t = $row['book_id'] - 1; // Since we just incremented it
    
    $stmt = $conn->prepare("INSERT INTO user_room_book (phone, name, idproof, room_type, checkin, checkout, days, ac, breakfast, lunch, snacks, dinner, swimming, status, price, book_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssssisssssssii", $phone, $name, $idproof, $room, $checkin, $checkout, $days, $ac, $breakfast, $lunch, $snacks, $dinner, $swimming, $status, $price, $t);
    $stmt->execute();
    
    header("Location: bookroom2.php");
    exit();
}
?>