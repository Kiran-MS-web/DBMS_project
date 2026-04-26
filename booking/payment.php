<?php
session_start();
if (!isset($_SESSION["user_phone"])) {
    header("Location: ../user/login.php");
    exit();
}
include '../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bid = $_POST["book_id"];
    $phone = $_SESSION["user_phone"];

    // Fetch the specific booking and ensure it belongs to the logged-in user
    $stmt = $conn->prepare("SELECT * FROM confirmed_booking WHERE book_id = ? AND phone = ?");
    $stmt->bind_param("is", $bid, $phone);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $price = $row['price'];
        $room_type = $row['room_type'];

        // Update balance
        $conn->query("UPDATE balance SET balance = balance + $price");

        // Move to booked_hist
        $insert_hist = $conn->prepare("INSERT INTO booked_hist (phone, name, idproof, room_type, checkin, checkout, days, ac, breakfast, lunch, snacks, dinner, swimming, price, book_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $insert_hist->bind_param("isssssissssssii", $row['phone'], $row['name'], $row['idproof'], $row['room_type'], $row['checkin'], $row['checkout'], $row['days'], $row['ac'], $row['breakfast'], $row['lunch'], $row['snacks'], $row['dinner'], $row['swimming'], $row['price'], $row['book_id']);
        $insert_hist->execute();

        // Delete from confirmed_booking
        $delete_conf = $conn->prepare("DELETE FROM confirmed_booking WHERE book_id = ?");
        $delete_conf->bind_param("i", $bid);
        $delete_conf->execute();

        // Update room count
        $update_rooms = $conn->prepare("UPDATE rooms_count SET available_rooms = available_rooms + 1, occupied_rooms = occupied_rooms - 1 WHERE room_type = ?");
        $update_rooms->bind_param("s", $room_type);
        $update_rooms->execute();

        header("Location: payment1.php");
        exit();
    } else {
        // Handle invalid booking ID or not belonging to user
        header("Location: user_payment.php");
        exit();
    }
}
?>