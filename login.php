<?php
require 'includes/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? AND password = SHA2(?, 256)");
    $stmt->execute([$email, $pass]);
    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];

        // Optional: Set cookie
        setcookie("user_id", $user['id'], time() + 86400);
        setcookie("user_email", $user['email'], time() + 86400);

        header("Location: index.php");
        exit;
    } else {
        $error = "Invalid credentials.";
    }
}

require 'View/login_form.php';
?>
