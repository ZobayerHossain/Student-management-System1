<?php
class Course {
    public static function getAll() {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM courses");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
