<?php include '../includes/header.php'; ?>

<div class="form-container">
    <div class="glass-card">
        <h2 class="title-main text-center">Admin Password Recovery</h2>
        <p class="subtitle text-center">Recover your administrator account password.</p>
        
        <form action="forgot_pwd1.php" method="post">
            <div class="form-group">
                <label for="adminid">Admin ID</label>
                <input type="text" id="adminid" name="adminid" class="form-control" placeholder="Enter Admin ID" required>
            </div>
            
            <div class="form-group">
                <label for="empid">Employee ID</label>
                <input type="text" id="empid" name="empid" class="form-control" placeholder="Enter Employee ID" required>
            </div>
            
            <button type="submit" class="btn btn-primary mt-4">Recover Password</button>
        </form>
        
        <div class="text-center mt-4">
            <a href="login.php" style="color: var(--primary-color); text-decoration: none; font-weight: 500;">Back to Login</a>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>