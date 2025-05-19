<?php
class Registration {
    public static function getByStudentId($student_id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT r.id, c.course_code, c.course_name, c.credits 
                               FROM registrations r 
                               JOIN courses c ON r.course_id = c.id 
                               WHERE r.student_id = ?");
        $stmt->execute([$student_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function register($student_id, $course_id) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO registrations (student_id, course_id) VALUES (?, ?)");
        return $stmt->execute([$student_id, $course_id]);
    }

    public static function unregister($id) {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM registrations WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
