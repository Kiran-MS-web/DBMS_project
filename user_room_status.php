<?php
session_start();
if (!isset($_SESSION["user_phone"])) {
    header("Location: user_login.php");
    exit();
}
include 'user_header.php';
include 'db.php';
?>

<div class="form-container" style="max-width: 900px; width: 95%;">
    <div class="glass-card mb-4">
        <h2 class="title-main text-center">Room Booking Status</h2>
        <p class="subtitle text-center">Check the status of your current bookings.</p>
        
        <table style="width: 100%; border-collapse: collapse; margin-top: 2rem;">
            <thead>
                <tr style="border-bottom: 2px solid var(--primary-color);">
                    <th style="padding: 1rem; text-align: left;">Booking ID</th>
                    <th style="padding: 1rem; text-align: left;">Room Type</th>
                    <th style="padding: 1rem; text-align: center;">Check-in</th>
                    <th style="padding: 1rem; text-align: center;">Check-out</th>
                    <th style="padding: 1rem; text-align: center;">Status</th>
                    <th style="padding: 1rem; text-align: right;">Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $phone = $_SESSION["user_phone"];
                $idproof = $_SESSION["user_idproof"];
                
                $stmt = $conn->prepare("SELECT book_id, room_type, checkin, checkout, status, price FROM user_room_book WHERE phone = ? AND idproof = ?");
                $stmt->bind_param("ss", $phone, $idproof);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr style='border-bottom: 1px solid #cbd5e1;'>";
                        echo "<td style='padding: 1rem; text-align: left;'>" . htmlspecialchars($row['book_id']) . "</td>";
                        echo "<td style='padding: 1rem; text-align: left;'>" . htmlspecialchars($row['room_type']) . "</td>";
                        echo "<td style='padding: 1rem; text-align: center;'>" . htmlspecialchars($row['checkin']) . "</td>";
                        echo "<td style='padding: 1rem; text-align: center;'>" . htmlspecialchars($row['checkout']) . "</td>";
                        
                        $statusColor = $row['status'] == 'Confirmed' ? 'green' : ($row['status'] == 'Cancelled' ? 'red' : 'orange');
                        echo "<td style='padding: 1rem; text-align: center; color: {$statusColor}; font-weight: 600;'>" . htmlspecialchars($row['status']) . "</td>";
                        
                        echo "<td style='padding: 1rem; text-align: right;'>$" . htmlspecialchars($row['price']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' style='text-align: center; padding: 2rem;'>No bookings found.</td></tr>";
                }
                $stmt->close();
                ?>
            </tbody>
        </table>
    </div>

    <div class="glass-card">
        <h3 class="text-center mb-4" style="color: var(--secondary-color);">Cancel a Booking</h3>
        <form action="user_cancel_room.php" method="post" class="form-row" style="align-items: flex-end;">
            <div class="form-group" style="flex: 2; margin-bottom: 0;">
                <label for="book_id">Enter Booking ID:</label>
                <input type="number" name="book_id" id="book_id" class="form-control" placeholder="Booking ID" required>
            </div>
            <div style="flex: 1;">
                <button type="submit" class="btn btn-secondary" style="width: 100%;">Cancel Booking</button>
            </div>
        </form>
    </div>
</div>

</div> <!-- Close dashboard-content -->
<?php 
$conn->close();
include 'footer.php'; 
?>