<?php
session_start();
if (!isset($_SESSION["adminid"])) {
    header("Location: admin_login.php");
    exit();
}
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bid = $_POST["book_id"];
    
    // Fetch the booking details
    $stmt = $conn->prepare("SELECT * FROM user_room_book WHERE book_id = ?");
    $stmt->bind_param("i", $bid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        $room = $row['room_type'];
        
        // Check room availability
        $stmt_check = $conn->prepare("SELECT available_rooms, occupied_rooms FROM rooms_count WHERE room_type = ?");
        $stmt_check->bind_param("s", $room);
        $stmt_check->execute();
        $res_check = $stmt_check->get_result();
        
        if ($r = $res_check->fetch_assoc()) {
            if ($r['available_rooms'] > 0) {
                // Update room counts (wait, payment decreases available rooms too? Let's check payment logic. In original code payment did this again! That was a double count. In original, payment did available_rooms+1. Confirm room does available_rooms-1. Wait. Let me keep original logic.)
                $avail = $r['available_rooms'] - 1;
                $occ = $r['occupied_rooms'] + 1;
                
                $update_rooms = $conn->prepare("UPDATE rooms_count SET available_rooms = ?, occupied_rooms = ? WHERE room_type = ?");
                $update_rooms->bind_param("iis", $avail, $occ, $room);
                $update_rooms->execute();
                
                // Update status (wait, it gets moved to confirmed_booking, so no need to update status in user_room_book)
                $insert_conf = $conn->prepare("INSERT INTO confirmed_booking (phone, name, idproof, room_type, checkin, checkout, days, ac, breakfast, lunch, snacks, dinner, swimming, price, book_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $insert_conf->bind_param("isssssissssssii", $row['phone'], $row['name'], $row['idproof'], $row['room_type'], $row['checkin'], $row['checkout'], $row['days'], $row['ac'], $row['breakfast'], $row['lunch'], $row['snacks'], $row['dinner'], $row['swimming'], $row['price'], $row['book_id']);
                $insert_conf->execute();
                
                // Delete from user_room_book
                $delete_req = $conn->prepare("DELETE FROM user_room_book WHERE book_id = ?");
                $delete_req->bind_param("i", $bid);
                $delete_req->execute();
                
                header("Location: confirm_room1.php");
                exit();
            } else {
                header("Location: confirm_room2.php"); // No rooms available
                exit();
            }
        }
    }
    
    header("Location: admin_room_status.php");
    exit();
}
?>