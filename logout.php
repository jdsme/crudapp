<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Logging Out | CRUD Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Logout-specific styles */
        .logout-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            padding: 2rem;
        }
        
        .logout-card {
            max-width: 500px;
            width: 100%;
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-xl);
            padding: 3rem;
            border: 1px solid var(--border-color);
            text-align: center;
            animation: fadeInUp 0.6s ease-out;
        }
        
        .logout-icon {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, var(--accent-coral), #ef4444);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            font-size: 3rem;
            box-shadow: 0 8px 20px rgba(255, 107, 107, 0.3);
            animation: pulse 2s ease-in-out infinite;
        }
        
        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
                box-shadow: 0 8px 20px rgba(255, 107, 107, 0.3);
            }
            50% {
                transform: scale(1.05);
                box-shadow: 0 12px 30px rgba(255, 107, 107, 0.4);
            }
        }
        
        .logout-title {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: var(--primary-dark);
        }
        
        .logout-message {
            color: var(--text-secondary);
            font-size: 1.125rem;
            margin-bottom: 2rem;
            line-height: 1.6;
        }
        
        .progress-bar-container {
            width: 100%;
            height: 6px;
            background: var(--bg-main);
            border-radius: 3px;
            overflow: hidden;
            margin: 2rem 0;
        }
        
        .progress-bar {
            height: 100%;
            background: linear-gradient(90deg, var(--accent-teal), var(--primary-light));
            width: 0%;
            animation: fillProgress 2s ease-in-out forwards;
            border-radius: 3px;
        }
        
        @keyframes fillProgress {
            0% {
                width: 0%;
            }
            100% {
                width: 100%;
            }
        }
        
        .countdown {
            font-size: 1rem;
            color: var(--text-light);
            margin-top: 1rem;
        }
        
        .success-checkmark {
            width: 80px;
            height: 80px;
            margin: 0 auto 1.5rem;
            position: relative;
        }
        
        .checkmark-circle {
            width: 80px;
            height: 80px;
            position: relative;
            display: inline-block;
            border-radius: 50%;
            background: linear-gradient(135deg, #10b981, #059669);
            box-shadow: 0 8px 20px rgba(16, 185, 129, 0.3);
        }
        
        .checkmark-circle::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 3rem;
            font-weight: bold;
            animation: checkmarkAppear 0.6s ease-out 0.3s backwards;
        }
        
        @keyframes checkmarkAppear {
            0% {
                opacity: 0;
                transform: translate(-50%, -50%) scale(0);
            }
            100% {
                opacity: 1;
                transform: translate(-50%, -50%) scale(1);
            }
        }
    </style>
</head>
<body>
    <div class="logout-container">
        <div class="logout-card">
            <div class="success-checkmark">
                <div class="checkmark-circle"></div>
            </div>
            
            <h1 class="logout-title">Logged Out Successfully</h1>
            <p class="logout-message">
                Thank you for using our system. You have been safely logged out.
                <br>Redirecting you to the login page...
            </p>
            
            <div class="progress-bar-container">
                <div class="progress-bar"></div>
            </div>
            
            <p class="countdown">
                Redirecting in <span id="countdown">2</span> seconds...
            </p>
        </div>
    </div>
    
    <div class="footer" style="position: fixed; bottom: 0; left: 0; right: 0; background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(10px);">
        <p>&copy; 2024 CRUD Dashboard System. All rights reserved.</p>
    </div>
    
    <script>
        // Countdown timer
        let seconds = 2;
        const countdownElement = document.getElementById('countdown');
        
        const countdownInterval = setInterval(() => {
            seconds--;
            if (seconds > 0) {
                countdownElement.textContent = seconds;
            } else {
                clearInterval(countdownInterval);
            }
        }, 1000);
        
        // Redirect after 2 seconds
        setTimeout(() => {
            window.location.href = 'login.php';
        }, 2000);
    </script>
</body>
</html>