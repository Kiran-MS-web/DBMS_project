<?php include 'header.php'; ?>

<div class="form-container">
    <div class="glass-card">
        <h2 class="title-main text-center">Admin Registration</h2>
        <p class="subtitle text-center">Create a new administrator account.</p>
        
        <form action="admin_signed_up.php" method="post">
            <div class="form-group">
                <label for="adminid">Admin ID</label>
                <input type="text" id="adminid" name="adminid" class="form-control" placeholder="Choose an admin ID" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Create a password" required>
            </div>
            
            <div class="form-group">
                <label for="empid">Employee ID</label>
                <input type="text" id="empid" name="empid" class="form-control" placeholder="Enter your Employee ID" required>
            </div>
            
            <button type="submit" class="btn btn-primary mt-4">Sign Up</button>
        </form>
        
        <div class="text-center mt-4">
            <a href="admin_login.php" style="color: var(--primary-color); text-decoration: none; font-weight: 500;">Already have an account? Login</a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>