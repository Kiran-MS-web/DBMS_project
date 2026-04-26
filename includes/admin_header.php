<?php $base_url = ""; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Azure - Admin Dashboard</title>
    <link rel="stylesheet" href="<?php echo $base_url; ?>/assets/css/style.css">
</head>
<body>
    <nav class="navbar">
        <div class="nav-brand">THE <span>AZURE</span> RESORT</div>
        <input type="checkbox" id="menu-toggle" class="menu-toggle">
        <label for="menu-toggle" class="hamburger">&#9776;</label>
        <ul class="nav-links">
            <li><a href="<?php echo $base_url; ?>/admin/dashboard.php">Dashboard</a></li>
            <li><a href="<?php echo $base_url; ?>/admin/add_room.php">Add Room</a></li>
            <li><a href="<?php echo $base_url; ?>/admin/remove_room.php">Remove Rooms</a></li>
            <li><a href="<?php echo $base_url; ?>/admin/room_status.php">Booking Requests</a></li>
            <li><a href="<?php echo $base_url; ?>/admin/confirmed_bookings.php">Confirmed</a></li>
            <li><a href="<?php echo $base_url; ?>/admin/booking_history.php">History</a></li>
            <li><a href="<?php echo $base_url; ?>/logout.php">Logout</a></li>
        </ul>
    </nav>
    <div class="dashboard-content">
