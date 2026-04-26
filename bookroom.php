<?php
session_start();
if (!isset($_SESSION["user_phone"])) {
    header("Location: user_login.php");
    exit();
}
include 'user_header.php';
include 'db.php';
?>

<div class="form-container" style="max-width: 800px;">
    
    <div class="glass-card mb-4">
        <h2 class="title-main text-center">Room Details</h2>
        <table style="width: 100%; border-collapse: collapse; margin-top: 1rem;">
            <thead>
                <tr style="border-bottom: 2px solid var(--primary-color);">
                    <th style="padding: 1rem; text-align: left;">Room Type</th>
                    <th style="padding: 1rem; text-align: center;">Number of Beds</th>
                    <th style="padding: 1rem; text-align: right;">Price / Night</th>
                </tr>
            </thead>
            <tbody>
                <tr style="border-bottom: 1px solid #cbd5e1;">
                    <td style="padding: 1rem; text-align: left;">Single Bedded</td>
                    <td style="padding: 1rem; text-align: center;">1</td>
                    <td style="padding: 1rem; text-align: right;">$1000</td>
                </tr>
                <tr style="border-bottom: 1px solid #cbd5e1;">
                    <td style="padding: 1rem; text-align: left;">Double Bedded</td>
                    <td style="padding: 1rem; text-align: center;">2</td>
                    <td style="padding: 1rem; text-align: right;">$1800</td>
                </tr>
                <tr style="border-bottom: 1px solid #cbd5e1;">
                    <td style="padding: 1rem; text-align: left;">Four Bedded</td>
                    <td style="padding: 1rem; text-align: center;">4</td>
                    <td style="padding: 1rem; text-align: right;">$3000</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="glass-card">
        <h2 class="title-main text-center">Book a Room</h2>
        <form action="bookroom1.php" method="post">
            <div class="form-group">
                <label for="rooms">Select Room Type:</label>
                <select name="rooms" id="rooms" class="form-control" required>
                    <option value="">-- Select --</option>
                    <option value="Single bed">Single Bedded</option>
                    <option value="Double bed">Double Bedded</option>
                    <option value="Four bed">Four Bedded</option>
                </select>
            </div>
            
            <div class="form-row">
                <div class="form-group" style="flex: 1;">
                    <label for="checkin">Check-In Date:</label>
                    <input type="date" name="checkin" id="checkin" class="form-control" required>
                </div>
                <div class="form-group" style="flex: 1;">
                    <label for="checkout">Check-Out Date:</label>
                    <input type="date" name="checkout" id="checkout" class="form-control" required>
                </div>
            </div>

            <h3 class="mt-4 mb-4" style="color: var(--secondary-color);">Add-on Services (per day)</h3>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                <div style="display: flex; justify-content: space-between; padding: 0.5rem; border: 1px solid #cbd5e1; border-radius: 8px; background: white;">
                    <label style="margin: 0; display: flex; align-items: center; gap: 0.5rem;"><input type="checkbox" name="ac" value="on"> AC</label>
                    <span>$300</span>
                </div>
                <div style="display: flex; justify-content: space-between; padding: 0.5rem; border: 1px solid #cbd5e1; border-radius: 8px; background: white;">
                    <label style="margin: 0; display: flex; align-items: center; gap: 0.5rem;"><input type="checkbox" name="breakfast" value="on"> Breakfast</label>
                    <span>$150</span>
                </div>
                <div style="display: flex; justify-content: space-between; padding: 0.5rem; border: 1px solid #cbd5e1; border-radius: 8px; background: white;">
                    <label style="margin: 0; display: flex; align-items: center; gap: 0.5rem;"><input type="checkbox" name="lunch" value="on"> Lunch</label>
                    <span>$300</span>
                </div>
                <div style="display: flex; justify-content: space-between; padding: 0.5rem; border: 1px solid #cbd5e1; border-radius: 8px; background: white;">
                    <label style="margin: 0; display: flex; align-items: center; gap: 0.5rem;"><input type="checkbox" name="snacks" value="on"> Evening Snacks</label>
                    <span>$120</span>
                </div>
                <div style="display: flex; justify-content: space-between; padding: 0.5rem; border: 1px solid #cbd5e1; border-radius: 8px; background: white;">
                    <label style="margin: 0; display: flex; align-items: center; gap: 0.5rem;"><input type="checkbox" name="dinner" value="on"> Dinner</label>
                    <span>$250</span>
                </div>
                <div style="display: flex; justify-content: space-between; padding: 0.5rem; border: 1px solid #cbd5e1; border-radius: 8px; background: white;">
                    <label style="margin: 0; display: flex; align-items: center; gap: 0.5rem;"><input type="checkbox" name="swimming" value="on"> Swimming Pool</label>
                    <span>$300</span>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-4">Review Booking</button>
        </form>
    </div>
</div>

</div> <!-- Close dashboard-content -->
<?php include 'footer.php'; ?>