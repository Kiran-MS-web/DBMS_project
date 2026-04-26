<?php 
session_start();
if (!isset($_SESSION["user_phone"])) {
    header("Location: login.php");
    exit();
}
include '../includes/user_header.php'; 
?>

<div class="form-container" style="max-width: 600px;">
    <div class="glass-card">
        <h2 class="title-main text-center">Welcome, <?php echo htmlspecialchars($_SESSION["user_name"]); ?>!</h2>
        <p class="subtitle text-center">Here is your profile information.</p>
        
        <table style="width: 100%; margin-top: 1rem; border-collapse: separate; border-spacing: 0 1rem;">
            <tr>
                <td><strong>Name:</strong></td>
                <td><?php echo htmlspecialchars($_SESSION["user_name"]); ?></td>
            </tr>
            <tr>
                <td><strong>Phone Number:</strong></td>
                <td><?php echo htmlspecialchars($_SESSION["user_phone"]); ?></td>
            </tr>
            <tr>
                <td><strong>Email Address:</strong></td>
                <td><?php echo htmlspecialchars($_SESSION["user_email"]); ?></td>
            </tr>
            <tr>
                <td><strong>Date of Birth:</strong></td>
                <td><?php echo htmlspecialchars($_SESSION["user_dob"]); ?></td>
            </tr>
            <tr>
                <td><strong>ID Proof:</strong></td>
                <td><?php echo htmlspecialchars($_SESSION["user_idproof"]); ?></td>
            </tr>
        </table>
    </div>
</div>

</div> <!-- Close dashboard-content -->
<?php include '../includes/footer.php'; ?>