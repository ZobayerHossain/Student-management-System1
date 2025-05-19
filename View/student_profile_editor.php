<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <link rel="stylesheet" href="CSS/student.css">
</head>
<body>
    <h2>Edit Profile for <?= htmlspecialchars($student['name']) ?></h2>
    <form method="POST" action="index.php?page=save_profile">
        <input type="hidden" name="id" value="<?= $student['id'] ?>">
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($student['email']) ?>" required>
        
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" value="<?= htmlspecialchars($student['phone']) ?>" required>
        
        <button type="submit">Save Changes</button>
    </form>
    
    <p><a href="index.php?page=student_dashboard">Back to Dashboard</a></p>
</body>
</html>
