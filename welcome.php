<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Welcome Guest</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="dashboard-header">
        <div class="header-content">
            <a href="#" class="logo">
                <div class="logo-icon">🌟</div>
                Guest Portal
            </a>
            <div class="user-info">
                <span class="user-badge">Guest</span>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="welcome-section">
            <h1 class="welcome-title">Welcome Guest!</h1>
            <p class="welcome-subtitle">Thank you for visiting our system</p>
        </div>

        <div class="card" style="max-width: 600px; margin: 0 auto; text-align: center;">
            <div class="card-header" style="border: none;">
                <h3 class="card-title" style="margin: 0 auto;">
                    <span class="card-icon">ℹ️</span>
                    Guest Access
                </h3>
            </div>
            
            <p style="color: var(--text-secondary); margin-bottom: 2rem; font-size: 1.1rem;">
                You are currently viewing the system as a guest. Your access is limited.
            </p>

            <div class="action-links" style="justify-content: center;">
                <button onclick="location.href='logout.php'" class="logout-btn">🚪 Logout</button>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2024 CRUD Dashboard System. All rights reserved.</p>
    </div>
</body>
</html>