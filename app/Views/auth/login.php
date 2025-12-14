<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login - PowerMVC</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body style="display:flex; justify-content:center; align-items:center; height:100vh;">

    <div class="form-card" style="width: 100%; max-width: 400px;">
        <h2 class="section-title" style="text-align:center; border:none;">Login</h2>
        
        <form action="/login-attempt" method="POST">
            <div class="form-group">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-input" required>
            </div>

            <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-input" required>
            </div>

            <button type="submit" class="btn">Sign In</button>
            
            <p style="text-align: center; margin-top: 15px; font-size: 0.9rem;">
                Need an account? <a href="/create">Register here</a>
            </p>
        </form>
    </div>

</body>
</html>