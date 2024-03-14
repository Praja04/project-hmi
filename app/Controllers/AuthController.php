<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
        return view('auth/sign-in');
    }

    public function login_action()
    {
        $userModel = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Validasi input
        if (empty($email) || empty($password)) {
            session()->setFlashdata('gagal', 'Isi data dulu!');
            return redirect()->to(base_url('login'));
        }

        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set('user_email', $user['email']);
            session()->set('user_nama', $user['username']);
            session()->set('user_id', $user['id']);

            return redirect()->to(base_url('user'));
        } else {
            session()->setFlashdata('gagal', 'Username / Password salah');
            return redirect()->to(base_url('login'));
        }
    }

    public function register()
    {
        return view('auth/sign-up'); // Ganti 'auth/register' dengan nama view registrasi yang sesuai
    }

    public function register_action()
    {
        $userModel = new UserModel();

        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Validasi input
        if (empty($username) || empty($email) || empty($password)) {
            session()->setFlashdata('gagal', 'Isi semua data!');
            return redirect()->to(base_url('register'));
        }

        // Cek apakah email sudah terdaftar
        if ($userModel->where('email', $email)->countAllResults() > 0) {
            session()->setFlashdata('gagal', 'Email sudah terdaftar, gunakan email lain.');
            return redirect()->to(base_url('register'));
        }

        // Hash password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Menyimpan data pengguna ke database
        $userData = [
            'username' => $username,
            'email' => $email,
            'password' => $hashedPassword,
        ];

        $userModel->insert($userData);

        session()->setFlashdata('sukses', 'Registrasi berhasil! Silakan login.');
        return redirect()->to(base_url('login'));
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}
