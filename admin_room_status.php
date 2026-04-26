<?php
session_start();
if (!isset($_SESSION["adminid"])) {
    header("Location: admin_login.php");
    exit();
}
include 'admin_header.php';
include 'db.php';
?>

<div class="form-container" style="max-width: 900px; width: 95%;">
    <div class="glass-card mb-4">
        <h2 class="title-main text-center">Booking Requests</h2>
        <p class="subtitle text-center">Manage pending user bookings.</p>
        
        <table style="width: 100%; border-collapse: collapse; margin-top: 2rem;">
            <thead>
                <tr style="border-bottom: 2px solid var(--primary-color);">
                    <th style="padding: 1rem; text-align: left;">Booking ID</th>
                    <th style="padding: 1rem; text-align: left;">Name</th>
                    <th style="padding: 1rem; text-align: left;">Room Type</th>
                    <th style="padding: 1rem; text-align: center;">Check-in</th>
                    <th style="padding: 1rem; text-align: center;">Check-out</th>
                    <th style="padding: 1rem; text-align: right;">Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT book_id, name, room_type, checkin, checkout, price FROM user_room_book WHERE status = 'Waiting'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr style='border-bottom: 1px solid #cbd5e1;'>";
                        echo "<td style='padding: 1rem; text-align: left; font-weight: bold;'>" . htmlspecialchars($row['book_id']) . "</td>";
                        echo "<td style='padding: 1rem; text-align: left;'>" . htmlspecialchars($row['name']) . "</td>";
                        echo "<td style='padding: 1rem; text-align: left;'>" . htmlspecialchars($row['room_type']) . "</td>";
                        echo "<td style='padding: 1rem; text-align: center;'>" . htmlspecialchars($row['checkin']) . "</td>";
                        echo "<td style='padding: 1rem; text-align: center;'>" . htmlspecialchars($row['checkout']) . "</td>";
                        echo "<td style='padding: 1rem; text-align: right;'>$" . htmlspecialchars($row['price']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' style='text-align: center; padding: 2rem;'>No pending booking requests.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="glass-card">
        <h3 class="text-center mb-4" style="color: var(--secondary-color);">Action on Booking</h3>
        <form method="post" class="form-row" style="align-items: flex-end;">
            <div class="form-group" style="flex: 2; margin-bottom: 0;">
                <label for="book_id">Enter Booking ID:</label>
                <input type="number" name="book_id" id="book_id" class="form-control" placeholder="Booking ID" required>
            </div>
            <div style="flex: 2; display: flex; gap: 1rem;">
                <button type="submit" formaction="confirm_room.php" class="btn btn-primary" style="flex: 1;">Confirm</button>
                <button type="submit" formaction="cancel_room.php" class="btn btn-secondary" style="flex: 1; border-color: red; color: red;">Cancel</button>
            </div>
        </form>
    </div>
</div>

</div> <!-- Close dashboard-content -->
<?php 
$conn->close();
include 'footer.php'; 
?>