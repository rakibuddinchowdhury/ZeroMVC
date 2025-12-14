<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\User;

class HomeController extends Controller
{
    // STRICT SECURITY: Redirects to login if session is missing
    public function __construct()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
            exit;
        }
    }

    public function index()
    {
        $userModel = new User();
        $users = $userModel->all(); 
        return $this->render('home', ['users' => $users]);
    }

    public function about()
    {
        return "This is the About Page";
    }

    // --- CRUD ACTIONS ---

    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: /");
            exit;
        }

        $userModel = new User();
        $user = $userModel->find($id);

        return $this->render('edit', ['user' => $user]);
    }

    public function update()
    {
        $id = $_POST['id'] ?? null;
        
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email']
        ];

        if ($id) {
            $userModel = new User();
            $userModel->update($id, $data);
        }

        header("Location: /");
        exit;
    }

    public function delete()
    {
        $id = $_POST['id'] ?? null;
        if ($id) {
            $user = new User();
            $user->delete($id);
        }
        header("Location: /");
        exit;
    }
}