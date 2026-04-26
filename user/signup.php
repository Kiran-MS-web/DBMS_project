<?php include '../includes/header.php'; ?>

<div class="form-container">
    <div class="glass-card">
        <h2 class="title-main text-center">New User Sign Up</h2>
        <p class="subtitle text-center">Join The Deluxe Hotel today!</p>
        
        <form action="signed_up.php" method="post">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Enter full name" required>
            </div>
            
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="number" id="phone" name="phone" class="form-control" placeholder="Enter phone number" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Create a password" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter email address" required>
            </div>
            
            <div class="form-group">
                <label for="idproof">ID Proof Details</label>
                <input type="text" id="idproof" name="idproof" class="form-control" placeholder="Enter ID Proof (e.g., Passport/License)" required>
            </div>
            
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob" class="form-control" required>
            </div>
            
            <button type="submit" class="btn btn-primary mt-4">Create Account</button>
        </form>
        
        <div class="text-center mt-4">
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>