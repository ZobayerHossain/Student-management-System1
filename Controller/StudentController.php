<?php
require_once __DIR__ . '/../Model/Student.php';

class StudentController {
    public static function dashboard() {
        $students = Student::getAll();
        require __DIR__ . '/../View/student_dashboard.php';
    }

    public static function profileEditor($id) {
        $student = Student::getById($id);
        if (!$student) {
            header("Location: index.php?page=student_dashboard");
            exit;
        }
        require __DIR__ . '/../View/student_profile_editor.php';
    }

    public static function saveProfile() {
        $id = $_POST['id'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        Student::update($id, $email, $phone);
        header("Location: index.php?page=student_dashboard");
        exit;
    }
}
