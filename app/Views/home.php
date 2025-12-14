<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PowerMVC Dashboard</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

    <nav class="navbar">
        <div class="brand">PowerMVC</div>
        <div class="nav-links">
            <?php if (isset($_SESSION['user_id'])): ?>
                <span>Welcome, <?php echo $_SESSION['user_name']; ?></span>
                <a href="/logout" style="color: #ef4444;">Logout</a>
            <?php else: ?>
                <a href="/login">Login</a>
            <?php endif; ?>
        </div>
    </nav>

    <div class="container">
        
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
            <h1 class="section-title" style="margin-bottom: 0;">Registered Users</h1>
            <a href="/create" class="btn" style="width: auto;">+ Add New User</a>
        </div>

        <div class="user-grid">
            
            <?php if (empty($users)): ?>
                <p>No users found. Click the button above to add one!</p>
            <?php else: ?>
                <?php foreach ($users as $user): ?>
                <div class="card">
                    
                    <div class="avatar" style="<?php echo !empty($user['photo']) ? 'padding:0; overflow:hidden;' : ''; ?>">
                        <?php if (!empty($user['photo'])): ?>
                            <img src="<?php echo $user['photo']; ?>" alt="User Photo" style="width:100%; height:100%; object-fit:cover;">
                        <?php else: ?>
                            <?php echo strtoupper(substr($user['name'], 0, 1)); ?>
                        <?php endif; ?>
                    </div>
                    
                    <h3 class="user-name"><?php echo htmlspecialchars($user['name']); ?></h3>
                    <p class="user-email"><?php echo htmlspecialchars($user['email']); ?></p>
                    
                    <a href="/edit?id=<?php echo $user['id']; ?>" class="btn">Edit</a>

                    <form action="/delete" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');" style="width: 100%;">
                        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>

                </div>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>
    </div>

</body>
</html>