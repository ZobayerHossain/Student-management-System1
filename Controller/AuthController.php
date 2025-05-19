<?php
class AuthController {
    public static function showLogin() {
        require 'View/login.php';
    }

    public static function login() {
        global $pdo;
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        // Simple user validation from 'users' table (you must create this)
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Login success
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];

            // Set cookies (optional, 7 days)
            setcookie('user_id', $user['id'], time() + 604800);
            setcookie('user_email', $user['email'], time() + 604800);

            header('Location: index.php?page=student_dashboard');
            exit;
        } else {
            $error = "Invalid email or password";
            require 'View/login.php';
        }
    }

    public static function logout() {
        session_destroy();
        setcookie('user_id', '', time() - 3600);
        setcookie('user_email', '', time() - 3600);
        header('Location: index.php?page=login');
        exit;
    }
}
?>
