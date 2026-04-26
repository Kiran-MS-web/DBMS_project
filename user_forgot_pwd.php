<?php include 'header.php'; ?>

<div class="form-container">
    <div class="glass-card">
        <h2 class="title-main text-center">User Password Recovery</h2>
        <p class="subtitle text-center">Recover your account password.</p>
        
        <form action="user_forgot_pwd1.php" method="post">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email address" required>
            </div>
            
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob" class="form-control" required>
            </div>
            
            <button type="submit" class="btn btn-primary mt-4">Recover Password</button>
        </form>
        
        <div class="text-center mt-4">
            <a href="user_login.php" style="color: var(--primary-color); text-decoration: none; font-weight: 500;">Back to Login</a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>