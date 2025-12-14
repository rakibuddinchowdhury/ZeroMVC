<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        if (isset($_SESSION['user_id'])) {
            header("Location: /");
            exit;
        }
        return $this->render('auth/login');
    }

    public function attempt()
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $userModel = new User();
        $stmt = $userModel->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            header("Location: /");
            exit;
        }

        echo "Invalid email or password. <a href='/login'>Try again</a>";
    }

    public function logout()
    {
        session_destroy();
        header("Location: /login");
        exit;
    }

    public function register()
    {
        if (isset($_SESSION['user_id'])) {
            header("Location: /");
            exit;
        }
        return $this->render('create');
    }

    // --- UPDATED STORE METHOD WITH FILE UPLOAD ---
    public function store()
    {
        if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])) {
            die("Please fill all fields");
        }

        // 1. Handle File Upload
        $photoPath = null;
        
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
            // Define directory: Root/public/uploads/
            $uploadDir = __DIR__ . '/../../public/uploads/';
            
            // Create folder if not exists
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            // Generate unique name to prevent overwriting
            $filename = time() . '_' . basename($_FILES['photo']['name']);
            $targetPath = $uploadDir . $filename;

            // Move the file
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetPath)) {
                $photoPath = '/uploads/' . $filename; // Path to save in DB
            }
        }

        // 2. Prepare Data
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'photo' => $photoPath
        ];

        // 3. Save User
        $user = new User();
        $user->save($data);

        header("Location: /login");
        exit;
    }
}