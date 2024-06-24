<?php

namespace App\Controllers;

use App\Models\StudentModel;
use CodeIgniter\Controller;

class Home extends Controller
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }
        $studentModel = new StudentModel();
        $data['students'] = $studentModel->findAll();
        return view('home', $data);
    }
    public function login()
    {
        helper(['form']);
        echo view('login');
    }
    public function loginAuth()
    {
        $session = session();
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required|alpha_numeric',
            'password' => 'required|min_length[5]'
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            $session->setFlashdata('msg', 'Validation failed');
            return redirect()->to('/login');
        }
        $username = $this->request->getVar('username', FILTER_SANITIZE_STRING);
        $password = $this->request->getVar('password', FILTER_SANITIZE_STRING);
        // Replace this with your user model authentication
        $user = [
            'username' => 'admin',
            'password' => password_hash('password', PASSWORD_DEFAULT)
        ];
        if ($username == $user['username'] && password_verify($password, $user['password'])) {
            $session->set([
                'username' => $username,
                'isLoggedIn' => TRUE
            ]);
            return redirect()->to('/');
        } else {
            $session->setFlashdata('msg', 'Username or Password is incorrect');
            return redirect()->to('/login');
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
    public function description()
    {
        echo view('description');
    }
}
