<?php
session_start();
if (!isset($_SESSION["adminid"])) {
    header("Location: login.php");
    exit();
}
include '../includes/admin_header.php';
include '../includes/db.php';
?>

<div class="form-container" style="max-width: 900px; width: 95%;">
    <div class="glass-card mb-4">
        <h2 class="title-main text-center">Add Rooms</h2>
        <p class="subtitle text-center">Increase the inventory of available rooms.</p>
        
        <table style="width: 100%; border-collapse: collapse; margin-top: 2rem;">
            <thead>
                <tr style="border-bottom: 2px solid var(--primary-color);">
                    <th style="padding: 1rem; text-align: left;">Room Type</th>
                    <th style="padding: 1rem; text-align: center;">Available Rooms</th>
                    <th style="padding: 1rem; text-align: center;">Occupied Rooms</th>
                    <th style="padding: 1rem; text-align: right;">Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT room_type, available_rooms, occupied_rooms, price FROM rooms_count";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr style='border-bottom: 1px solid #cbd5e1;'>";
                        echo "<td style='padding: 1rem; text-align: left;'>" . htmlspecialchars($row['room_type']) . "</td>";
                        echo "<td style='padding: 1rem; text-align: center; font-weight: bold; color: var(--primary-color);'>" . htmlspecialchars($row['available_rooms']) . "</td>";
                        echo "<td style='padding: 1rem; text-align: center;'>" . htmlspecialchars($row['occupied_rooms']) . "</td>";
                        echo "<td style='padding: 1rem; text-align: right;'>$" . htmlspecialchars($row['price']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' style='text-align: center; padding: 2rem;'>No room data available.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="glass-card">
        <h3 class="text-center mb-4" style="color: var(--secondary-color);">Add Room Inventory</h3>
        <form action="room_added.php" method="post" class="form-row" style="align-items: flex-end;">
            <div class="form-group" style="flex: 2; margin-bottom: 0;">
                <label for="rooms">Select Room Type:</label>
                <select name="rooms" id="rooms" class="form-control" required>
                    <option value="">Select</option>
                    <option value="Single bed">Single bedded</option>
                    <option value="Double bed">Double bedded</option>
                    <option value="Four bed">Four bedded</option>
                </select>
            </div>
            <div class="form-group" style="flex: 2; margin-bottom: 0;">
                <label for="noofrooms">Number of Rooms to Add:</label>
                <input type="number" min="1" name="noofrooms" id="noofrooms" class="form-control" placeholder="Qty" required>
            </div>
            <div style="flex: 1;">
                <button type="submit" class="btn btn-primary" style="width: 100%;">Add Rooms</button>
            </div>
        </form>
    </div>
</div>

</div> <!-- Close dashboard-content -->
<?php 
$conn->close();
include '../includes/footer.php'; 
?>