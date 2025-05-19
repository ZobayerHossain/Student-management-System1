<?php
require 'includes/db.php';
require 'includes/session.php';

$page = $_GET['page'] ?? 'login';

require 'Controller/AuthController.php';

switch ($page) {
    case 'login':
        AuthController::showLogin();
        break;
    case 'login_submit':
        AuthController::login();
        break;
    case 'logout':
        AuthController::logout();
        break;
    case 'student_dashboard':
        // Only allow if logged in
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?page=login');
            exit;
        }
        require 'Controller/StudentController.php';
        StudentController::dashboard();
        break;
    // other pages here ...
    default:
        header('Location: index.php?page=login');
        exit;
}
?>
