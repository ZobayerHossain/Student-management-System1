<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="CSS/student.css">
</head>
<body>
    <h1>Student Dashboard</h1>
    <?php if (!empty($students)): ?>
        <ul>
        <?php foreach ($students as $student): ?>
            <li>
                <?= htmlspecialchars($student['name']) ?> - 
                <a href="index.php?page=edit_profile&id=<?= $student['id'] ?>">Edit Profile</a>
            </li>
        <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No students found.</p>
    <?php endif; ?>
</body>
</html>
