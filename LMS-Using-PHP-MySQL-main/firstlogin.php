<?php
session_start();
require_once 'db.php';

// Redirect to dashboard if user is already logged in
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to LearnHub LMS</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Arial, sans-serif;
        }

        body {
            background: #f5f7fa;
            color: #333;
        }

        /* Header Styles */
        header {
            background: #2c3e50;
            color: white;
            padding: 1rem 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        header h1 {
            font-size: 1.8rem;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-left: 1.5rem;
            font-size: 1rem;
        }

        nav a:hover {
            color: #3498db;
        }

        /* Hero Section */
        .hero {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 60vh;
            background: linear-gradient(45deg, #3498db, #8e44ad);
            color: white;
            text-align: center;
            padding: 2rem;
        }

        .hero-content {
            max-width: 700px;
        }

        .hero h2 {
            font-size: 2.8rem;
            margin-bottom: 1rem;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        .cta-btn {
            display: inline-block;
            padding: 0.8rem 2rem;
            background: #e74c3c;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1.1rem;
            transition: background 0.3s;
        }

        .cta-btn:hover {
            background: #4d4e58ff;
        }

        /* Features Section */
        .features {
            padding: 3rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .feature-card {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .feature-card h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: #2c3e50;
        }

        .feature-card p {
            font-size: 1rem;
            color: #666;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 1rem;
            background: #2c3e50;
            color: white;
            width: 100%;
        }

        @media (max-width: 768px) {
            .hero h2 {
                font-size: 2rem;
            }

            .hero p {
                font-size: 1rem;
            }

            .features {
                grid-template-columns: 1fr;
                padding: 2rem 1rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>LearnHub LMS</h1>
        <nav>
            <a href="index.php" >Home</a>
            <a href="courses.php">Courses</a>
            <a href="about.php">About</a>
            <a href="contact.php">Contact</a>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        </nav>
    </header>

    <section class="hero">
        <div class="hero-content">
            <h2>Unlock Your Potential with LearnHub LMS</h2>
            <p></p>
            <a href="login.php" class="cta-btn">Get Started</a>
        </div>
    </section>

    <section class="features">
        <div class="feature-card">
            <h3>Expert-Led Courses</h3>
            <p>Learn from industry professionals with real-world experience in your field of interest.</p>
        </div>
        <div class="feature-card">
            <h3>Flexible Learning</h3>
            <p>Study at your own pace, anytime, anywhere, with our mobile-friendly platform.</p>
        </div>
        <div class="feature-card">
            <h3>Community Support</h3>
            <p>Connect with peers and mentors through forums and live discussions.</p>
        </div>
    </section>

    <footer>
        <p>&copy; 2025 LearnHub LMS. All rights reserved.</p>
    </footer>
</body>
</html>