<?php
session_start();
if (!isset($_SESSION["adminid"])) {
    header("Location: login.php");
    exit();
}
include '../includes/admin_header.php';
include '../includes/db.php';
?>

<div class="form-container" style="max-width: 800px;">
    <div class="glass-card">
        <h2 class="title-main text-center">Rooms Information</h2>
        <p class="subtitle text-center">Current availability and pricing.</p>
        
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
                        echo "<td style='padding: 1rem; text-align: center;'>" . htmlspecialchars($row['available_rooms']) . "</td>";
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
</div>

</div> <!-- Close dashboard-content -->
<?php include '../includes/footer.php'; ?>