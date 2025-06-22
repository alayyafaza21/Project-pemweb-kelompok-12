<?php
require_once 'models/User.php';

class AuthController
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $userModel = new User();
            $user = $userModel->findByEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user;
                header('Location: index.php?page=choose_role');
                exit();
            } else {
                $error = "Email atau password salah!";
                include 'views/login.php';
            }
        } else {
            include 'views/login.php';
        }
    }

    public function chooseRole()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?page=login');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $role = $_POST['role'] ?? '';
            $_SESSION['role'] = $role;

            if ($role === 'teacher') {
                header('Location: index.php?page=teacher_dashboard');
            } else {
                header('Location: index.php?page=student_dashboard');
            }
            exit();
        } else {
            include 'views/choose_role.php';
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: index.php?page=login');
        exit();
    }
}

