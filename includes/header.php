<?php $base_url = "/Hotel-Management-System-master"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Microsoft_Azure.svg/1280px-Microsoft_Azure.svg.png"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Azure</title>
    <link rel="stylesheet" href="<?php echo $base_url; ?>/assets/css/style.css">
</head>
<body>
    <nav class="navbar">
        <div class="nav-brand">THE <span>AZURE</span> RESORT</div>
        <input type="checkbox" id="menu-toggle" class="menu-toggle">
        <label for="menu-toggle" class="hamburger">&#9776;</label>
        <ul class="nav-links">
            <li><a href="<?php echo $base_url; ?>/index.php">HOME</a></li>
            <li><a href="<?php echo $base_url; ?>/admin/login.php">ADMIN LOGIN</a></li>
            <li><a href="<?php echo $base_url; ?>/user/login.php">USER LOGIN</a></li>
            <li><a href="<?php echo $base_url; ?>/index.php#rooms_and_rates">ROOM GALLERY</a></li>
            <li><a href="<?php echo $base_url; ?>/image_gallery.php">IMAGE GALLERY</a></li>
            <li><a href="#contact">CONTACT DETAILS</a></li>
        </ul>
    </nav>
