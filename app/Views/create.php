<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create User</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <nav class="navbar">
        <div class="brand">PowerMVC</div>
        <div class="nav-links">
            <a href="/">Back to Home</a>
        </div>
    </nav>

    <div class="container">
        <div class="form-card">
            <h2 class="section-title" style="border:none; padding:0;">Add New User</h2>
            
            <form action="/store" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-input" placeholder="e.g. John Doe" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-input" placeholder="e.g. john@example.com" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Profile Photo</label>
                    <input type="file" name="photo" class="form-input" accept="image/*">
                </div>

                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-input" placeholder="******" required>
                </div>

                <button type="submit" class="btn">Create Account</button>
            </form>
        </div>
    </div>
</body>
</html>