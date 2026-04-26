<?php
session_start();
if (!isset($_SESSION["user_phone"])) {
    header("Location: user_login.php");
    exit();
}
include 'user_header.php';
?>

<div class="form-container">
    <div class="glass-card text-center">
        <div style="font-size: 4rem; color: green; margin-bottom: 1rem;">&#10004;</div>
        <h2 class="title-main" style="color: green;">Payment Successful!</h2>
        <p class="subtitle mb-4">Your booking has been fully confirmed and payment is received.</p>
        
        <a href="user_view.php" class="btn btn-primary" style="display: inline-block; padding: 1rem 3rem;">Return to Dashboard</a>
    </div>
</div>

</div> <!-- Close dashboard-content -->
<?php include 'footer.php'; ?>