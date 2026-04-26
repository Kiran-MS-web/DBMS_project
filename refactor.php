<?php

$file_map = [
    // Includes
    'db.php' => 'includes/db.php',
    'admin_db.php' => 'includes/admin_db.php',
    'header.php' => 'includes/header.php',
    'footer.php' => 'includes/footer.php',
    'user_header.php' => 'includes/user_header.php',
    'admin_header.php' => 'includes/admin_header.php',
    
    // Admin
    'admin_login.php' => 'admin/login.php',
    'admin_view.php' => 'admin/dashboard.php',
    'admin_signup.php' => 'admin/signup.php',
    'admin_forgot_pwd.php' => 'admin/forgot_pwd.php',
    'admin_forgot_pwd1.php' => 'admin/forgot_pwd1.php',
    'admin_found.php' => 'admin/found.php',
    'admin_not_found.php' => 'admin/not_found.php',
    'admin_modify_room.php' => 'admin/modify_room.php',
    'admin_modify_room1.php' => 'admin/modify_room1.php',
    'admin_room_added.php' => 'admin/room_added.php',
    'admin_room_added1.php' => 'admin/room_added1.php',
    'admin_room_history.php' => 'admin/room_history.php',
    'admin_room_removed.php' => 'admin/room_removed.php',
    'admin_room_removed1.php' => 'admin/room_removed1.php',
    'admin_room_status.php' => 'admin/room_status.php',
    'admin_signed_up.php' => 'admin/signed_up.php',
    'admin_signed_up1.php' => 'admin/signed_up1.php',
    'admin_signed_up2.php' => 'admin/signed_up2.php',
    'add_room_admin.php' => 'admin/add_room.php',
    'remove_room_admin.php' => 'admin/remove_room.php',
    'room_confirm.php' => 'admin/room_confirm.php',
    'cancel_room.php' => 'admin/cancel_room.php',
    'cancel_room1.php' => 'admin/cancel_room1.php',
    'confirmed_bookings.php' => 'admin/confirmed_bookings.php',
    'booking_history.php' => 'admin/booking_history.php',
    
    // User
    'user_login.php' => 'user/login.php',
    'user_view.php' => 'user/dashboard.php',
    'user_signup.php' => 'user/signup.php',
    'user_forgot_pwd.php' => 'user/forgot_pwd.php',
    'user_forgot_pwd1.php' => 'user/forgot_pwd1.php',
    'user_found.php' => 'user/found.php',
    'user_not_found.php' => 'user/not_found.php',
    'user_logged_in.php' => 'user/logged_in.php',
    'user_not_created.php' => 'user/not_created.php',
    'user_created.php' => 'user/created.php',
    'user_signed_up.php' => 'user/signed_up.php',
    'user_booking_history.php' => 'user/booking_history.php',
    'user_cancel_room.php' => 'user/cancel_room.php',
    'user_cancel_room1.php' => 'user/cancel_room1.php',
    'user_room_history.php' => 'user/room_history.php',
    'user_room_status.php' => 'user/room_status.php',
    
    // Booking
    'bookroom.php' => 'booking/bookroom.php',
    'bookroom1.php' => 'booking/bookroom1.php',
    'bookroom2.php' => 'booking/bookroom2.php',
    'confirm_room.php' => 'booking/confirm_room.php',
    'confirm_room1.php' => 'booking/confirm_room1.php',
    'confirm_room2.php' => 'booking/confirm_room2.php',
    'payment.php' => 'booking/payment.php',
    'payment1.php' => 'booking/payment1.php',
    'user_payment.php' => 'booking/user_payment.php',
    
    // Root keep
    'index.php' => 'index.php',
    'logout.php' => 'logout.php',
    'image_gallery.php' => 'image_gallery.php',
    
    // Assets (we handle CSS and Images specially but we can replace strings)
    'style.css' => 'assets/css/style.css',
];

// Create directories
$dirs = ['assets/css', 'assets/images', 'includes', 'admin', 'user', 'booking'];
foreach ($dirs as $dir) {
    if (!file_exists($dir)) {
        mkdir($dir, 0777, true);
    }
}

// Move assets
if (file_exists('style.css')) rename('style.css', 'assets/css/style.css');
if (file_exists('Images') && is_dir('Images')) {
    // move contents of Images to assets/images
    $files = glob("Images/*");
    foreach($files as $file){
        $dest = 'assets/images/' . basename($file);
        rename($file, $dest);
    }
    rmdir('Images');
}

function getRelativePath($from, $to) {
    $fromParts = explode('/', $from);
    array_pop($fromParts); // remove filename
    $toParts = explode('/', $to);
    
    while(count($fromParts) > 0 && count($toParts) > 0 && $fromParts[0] == $toParts[0]) {
        array_shift($fromParts);
        array_shift($toParts);
    }
    
    $path = str_repeat('../', count($fromParts)) . implode('/', $toParts);
    return $path == '' ? './' : $path;
}

// Copy files to new locations first
foreach ($file_map as $old => $new) {
    if (file_exists($old) && $old != $new) {
        copy($old, $new);
    }
}

// Process new files
foreach ($file_map as $oldFile => $newFile) {
    if (!file_exists($newFile)) continue;
    
    $content = file_get_contents($newFile);
    
    // We need to replace all instances of original filenames with their relative path from the CURRENT file
    // First sort by string length descending to avoid replacing substrings (e.g. user_login.php vs login.php if already replaced)
    $replacements = [];
    foreach ($file_map as $targetOld => $targetNew) {
        $relativePath = getRelativePath($newFile, $targetNew);
        $replacements['"' . $targetOld . '"'] = '"' . $relativePath . '"';
        $replacements["'" . $targetOld . "'"] = "'" . $relativePath . "'";
        $replacements['location: ' . $targetOld] = 'Location: ' . $relativePath;
        $replacements['Location: ' . $targetOld] = 'Location: ' . $relativePath;
        $replacements['action="' . $targetOld . '"'] = 'action="' . $relativePath . '"';
        $replacements['href="' . $targetOld . '"'] = 'href="' . $relativePath . '"';
        $replacements['src="' . $targetOld . '"'] = 'src="' . $relativePath . '"';
    }
    
    // Also handle Images/ folder
    $relImageDir = getRelativePath($newFile, 'assets/images/');
    $content = str_replace(['"Images/', "'Images/"], ['"'.$relImageDir, "'".$relImageDir], $content);
    
    // Do the replacement safely
    $content = strtr($content, $replacements);
    
    file_put_contents($newFile, $content);
    echo "Processed $newFile\n";
}

// If everything succeeded, we can delete the old files
foreach ($file_map as $old => $new) {
    if ($old != $new && file_exists($old)) {
        unlink($old);
    }
}

echo "Refactoring complete.\n";

?>
