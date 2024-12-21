<?php

class AuthController
{
    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password = $_POST['password'];

            // Validate login
            $userModel = new User();
            $user = $userModel->login($username, $password);

            // Debugging: Tampilkan informasi tentang user yang ditemukan
            // echo "User: ";
            // print_r($user);

            if ($user) {
                $_SESSION['user_id'] = $user['id_users'];
                $_SESSION['username'] = $user['username'];
                header("Location: index.php?url=user/home");
            } else {
                // echo "Invalid username or password.";
            }
        }

        require_once "./App/Views/Authentication/Login/index.php";
    }


    public function register()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password = $_POST['password'];
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

            if ($username && $password && $email) {
                // Hash password before saving
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);

                $userModel = new User();
                $userModel->createUser($username, $passwordHash, $email);
                header("Location: index.php?url=auth/login");
            } else {
                echo "Invalid input.";
            }
        }

        require_once "./App/Views/Authentication/Register/index.php";
    }


    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header("Location: index.php?url=auth/login");
    }
}
