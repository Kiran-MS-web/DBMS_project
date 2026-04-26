<?php $base_url = "/Hotel-Management-System-master"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Azure - User Dashboard</title>
    <link rel="stylesheet" href="<?php echo $base_url; ?>/assets/css/style.css">
</head>
<body>
    <nav class="navbar">
        <div class="nav-brand">THE <span>AZURE</span> RESORT</div>
        <input type="checkbox" id="menu-toggle" class="menu-toggle">
        <label for="menu-toggle" class="hamburger">&#9776;</label>
        <ul class="nav-links">
            <li><a href="<?php echo $base_url; ?>/user/dashboard.php">My Info</a></li>
            <li><a href="<?php echo $base_url; ?>/booking/bookroom.php">Book A Room</a></li>
            <li><a href="<?php echo $base_url; ?>/user/room_status.php">Booking Status</a></li>
            <li><a href="<?php echo $base_url; ?>/booking/user_payment.php">Payment</a></li>
            <li><a href="<?php echo $base_url; ?>/user/booking_history.php">History</a></li>
            <li><a href="<?php echo $base_url; ?>/logout.php">Logout</a></li>
        </ul>
    </nav>
    <div class="dashboard-content">
