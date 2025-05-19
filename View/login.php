<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
    <h2>Login</h2>
    <form method="POST" action="index.php?page=login_action">
        <label>Email:</label><input type="email" name="email" required>
        <label>Password:</label><input type="password" name="password" required>
        <button type="submit">Login</button>
    </form>
    <a href="index.php?page=signup">Sign up</a> |
    <a href="index.php?page=forgot_password">Forgot Password?</a>
</body>
</html>
