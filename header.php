<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Country Escape</title>
    <link rel="stylesheet" href="header.css" />
</head>
<body>

<!-- Navbar -->
<header>
    <div class="navbar">
          <!-- Logo Center Me -->
          <div class="logo">
            <a href="index.php">
                <img src="logo.jpeg" alt="Country Escape" />
            </a>
        </div>
        <!-- Left Side Links -->
        <nav>
            <ul>
                <li><a href="destinations.php">Destinations</a></li>
                <li><a href="all-villas.php">All Villas</a></li>
                <li><a href="map.php">Map</a></li>
       
                <li><a href="about.php">About Us</a></li>
                <li><a href="magazines.php">Magazines</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </nav>

        <!-- Login / Profile Dropdown -->
        <div class="login">
            <?php if(isset($_SESSION['user_id'])): ?>
                <!-- Men Icon and Dropdown -->
                <div class="dropdown">
                    <img src="men-icon.png" alt="User" class="user-icon" onclick="toggleDropdown()" />
                    <div class="dropdown-content" id="dropdownMenu">
                        <p class="user-name">
                            👤 <?php echo $_SESSION['user_name']; ?>
                        </p>
                        <a href="dashboard.php">My Profile</a>
                        <a href="logout.php">Logout</a>
                    </div>
                </div>
            <?php else: ?>
                <a href="#" class="login-btn" onclick="openPopup()">Login</a>
            <?php endif; ?>
        </div>
    </div>
</header>

<!-- Hero Section -->
<div class="hero-section">
    <div class="hero-content">
        <h2>Finest Luxury Villas & Holiday Rental Collections</h2>
        <div class="search-box">
            <input type="text" placeholder="Destinations" />
            <input type="text" placeholder="Bedrooms" />
            <button type="submit">Search</button>
        </div>
    </div>
</div>

<!-- Popup for Login/Register -->
<div id="popup" class="popup">
    <div class="popup-content">
        <span class="close-btn" onclick="closePopup()">×</span>

        <!-- Login Form -->
        <form action="login.php" method="POST" id="login-form">
            <h3>Login</h3>
            <input type="email" name="email" placeholder="Email" required />
            <input type="password" name="password" placeholder="Password" required />
            <button type="submit">Login</button>
            <p>Don't have an account? <a href="#" onclick="showRegister()">Register</a></p>
        </form>

        <!-- Register Form -->
        <form action="register.php" method="POST" id="register-form" style="display: none;">
            <h3>Register</h3>
            <input type="text" name="name" placeholder="Full Name" required />
            <input type="email" name="email" placeholder="Email" required />
            <input type="password" name="password" placeholder="Password" required />
            <input type="password" name="confirm_password" placeholder="Confirm Password" required />
            <button type="submit">Register</button>
            <p>Already have an account? <a href="#" onclick="showLogin()">Login</a></p>
        </form>
    </div>
</div>

<!-- JavaScript for Popup and Dropdown -->
<script>
    // ✅ Open Popup
    function openPopup() {
        document.getElementById('popup').style.display = 'flex';
        document.getElementById('login-form').reset(); 
        document.getElementById('register-form').reset();
    }

    // ✅ Close Popup
    function closePopup() {
        document.getElementById('popup').style.display = 'none';
    }

    // ✅ Switch to Register Form
    function showRegister() {
        document.getElementById('login-form').style.display = 'none';
        document.getElementById('register-form').style.display = 'block';
        document.getElementById('register-form').reset(); 
    }

    // ✅ Switch to Login Form
    function showLogin() {
        document.getElementById('login-form').style.display = 'block';
        document.getElementById('register-form').style.display = 'none';
        document.getElementById('login-form').reset(); 
    }

    // ✅ Toggle Dropdown
    function toggleDropdown() {
        document.getElementById('dropdownMenu').classList.toggle('show');
    }

    // ✅ Close Dropdown If Clicked Outside
    window.onclick = function(event) {
        if (!event.target.matches('.user-icon')) {
            var dropdowns = document.getElementsByClassName('dropdown-content');
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>

</body>
</html>
