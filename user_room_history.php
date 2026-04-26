<?php
session_start();
if (!isset($_SESSION["user_phone"])) {
    header("Location: user_login.php");
    exit();
}
include 'user_header.php';
include 'db.php';
?>

<div class="form-container" style="max-width: 600px; width: 95%;">
    <div class="glass-card mb-4">
        <h2 class="title-main text-center">Booking Details</h2>
        <p class="subtitle text-center mb-4">Detailed view of your past stay.</p>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $bid = $_POST["book_id"];
            $phone = $_SESSION["user_phone"];
            
            $stmt = $conn->prepare("SELECT * FROM booked_hist WHERE book_id = ? AND phone = ?");
            $stmt->bind_param("is", $bid, $phone);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($row = $result->fetch_assoc()) {
                ?>
                <table style="width: 100%; border-collapse: collapse; font-size: 1.1rem;">
                    <tbody>
                        <tr style="border-bottom: 1px solid #cbd5e1;">
                            <th style="padding: 1rem; text-align: left; width: 50%;">Booking ID:</th>
                            <td style="padding: 1rem; text-align: right; font-weight: bold;"><?php echo htmlspecialchars($row['book_id']); ?></td>
                        </tr>
                        <tr style="border-bottom: 1px solid #cbd5e1;">
                            <th style="padding: 1rem; text-align: left;">Guest Name:</th>
                            <td style="padding: 1rem; text-align: right;"><?php echo htmlspecialchars($row['name']); ?></td>
                        </tr>
                        <tr style="border-bottom: 1px solid #cbd5e1;">
                            <th style="padding: 1rem; text-align: left;">Room Type:</th>
                            <td style="padding: 1rem; text-align: right;"><?php echo htmlspecialchars($row['room_type']); ?></td>
                        </tr>
                        <tr style="border-bottom: 1px solid #cbd5e1;">
                            <th style="padding: 1rem; text-align: left;">Check-in Date:</th>
                            <td style="padding: 1rem; text-align: right;"><?php echo htmlspecialchars($row['checkin']); ?></td>
                        </tr>
                        <tr style="border-bottom: 1px solid #cbd5e1;">
                            <th style="padding: 1rem; text-align: left;">Check-out Date:</th>
                            <td style="padding: 1rem; text-align: right;"><?php echo htmlspecialchars($row['checkout']); ?></td>
                        </tr>
                        <tr style="border-bottom: 1px solid #cbd5e1;">
                            <th style="padding: 1rem; text-align: left;">Days of Stay:</th>
                            <td style="padding: 1rem; text-align: right;"><?php echo htmlspecialchars($row['days']); ?></td>
                        </tr>
                        <tr style="border-bottom: 1px solid #cbd5e1;">
                            <th style="padding: 1rem; text-align: left;">Total Paid:</th>
                            <td style="padding: 1rem; text-align: right; color: var(--primary-color); font-weight: bold;">$<?php echo htmlspecialchars($row['price']); ?></td>
                        </tr>
                        <tr>
                            <th colspan="2" style="padding: 1.5rem 1rem 0.5rem; text-align: center; color: var(--secondary-color);">Included Amenities</th>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding: 0.5rem; text-align: center;">
                                <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
                                    <?php if($row['ac'] == 'true') echo "<span class='btn btn-secondary' style='padding: 0.5rem 1rem;'>AC</span>"; ?>
                                    <?php if($row['breakfast'] == 'true') echo "<span class='btn btn-secondary' style='padding: 0.5rem 1rem;'>Breakfast</span>"; ?>
                                    <?php if($row['lunch'] == 'true') echo "<span class='btn btn-secondary' style='padding: 0.5rem 1rem;'>Lunch</span>"; ?>
                                    <?php if($row['snacks'] == 'true') echo "<span class='btn btn-secondary' style='padding: 0.5rem 1rem;'>Snacks</span>"; ?>
                                    <?php if($row['dinner'] == 'true') echo "<span class='btn btn-secondary' style='padding: 0.5rem 1rem;'>Dinner</span>"; ?>
                                    <?php if($row['swimming'] == 'true') echo "<span class='btn btn-secondary' style='padding: 0.5rem 1rem;'>Swimming Pool</span>"; ?>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php
            } else {
                echo "<p class='text-center' style='color: red;'>Booking not found or access denied.</p>";
            }
            $stmt->close();
        } else {
            echo "<p class='text-center'>No booking ID provided.</p>";
        }
        ?>
        
        <div class="text-center mt-4">
            <a href="user_booking_history.php" class="btn btn-primary" style="display: inline-block;">Back to History</a>
        </div>
    </div>
</div>

</div> <!-- Close dashboard-content -->
<?php 
$conn->close();
include 'footer.php'; 
?>