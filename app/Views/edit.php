<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit User</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <nav class="navbar">
        <div class="brand">PowerMVC</div>
        <div class="nav-links">
            <a href="/">Cancel</a>
        </div>
    </nav>

    <div class="container">
        <div class="form-card">
            <h2 class="section-title" style="border:none; padding:0;">Edit User</h2>
            
            <form action="/update" method="POST">
                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">

                <div class="form-group">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-input" 
                           value="<?php echo htmlspecialchars($user['name']); ?>" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-input" 
                           value="<?php echo htmlspecialchars($user['email']); ?>" required>
                </div>

                <button type="submit" class="btn">Update User</button>
            </form>
        </div>
    </div>
</body>
</html>