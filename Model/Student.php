<?php
class Student {
    public static function getAll() {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM students");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM students WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function update($id, $email, $phone) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE students SET email = ?, phone = ? WHERE id = ?");
        return $stmt->execute([$email, $phone, $id]);
    }
}
