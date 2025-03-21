<?php
session_start();
include 'country_escape.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    // ✅ Password match check karo
    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match!'); window.history.back();</script>";
        exit;
    }

    // ✅ Duplicate email check karo
    $check_email = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $check_email);
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Email already exists!'); window.history.back();</script>";
        exit;
    }

    // ✅ Password ko hash karo
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // ✅ User ko database me insert karo
    $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashed_password')";
    
    if (mysqli_query($conn, $query)) {
        // ✅ Register ke baad automatic login karwao
        $_SESSION['user_id'] = mysqli_insert_id($conn);
        $_SESSION['user_name'] = $name;

        // ✅ Same page par redirect karo
        $redirect_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
        header("Location: $redirect_url");
        exit;
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "'); window.history.back();</script>";
    }
}
