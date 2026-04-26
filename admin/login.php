<?php include '../includes/header.php'; ?>

<div class="form-container">
    <div class="glass-card">
        <h2 class="title-main text-center">Admin Login</h2>
        <p class="subtitle text-center">Authorized personnel only.</p>
        
        <form action="../includes/admin_db.php" method="post">
            <div class="form-group">
                <label for="adminid">Admin ID</label>
                <input type="text" id="adminid" name="adminid" class="form-control" placeholder="Enter admin ID" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter password" required>
            </div>
            
            <button type="submit" class="btn btn-primary mt-4">Login</button>
        </form>
        
        <div class="form-row mt-4">
            <a href="signup.php" class="btn btn-secondary" style="flex: 1; margin-right: 0.5rem;">Sign Up</a>
            <a href="forgot_pwd.php" class="btn btn-secondary" style="flex: 1; margin-left: 0.5rem;">Forgot Password</a>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>