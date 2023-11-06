<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\UserModel;

class AuthController extends BaseController
{
    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function login()
    {
        $data = [];

        if ($this->request->getMethod() == 'post') {

            $rules = [
                'username' => 'required|min_length[3]|max_length[50]',
                'password' => 'required|min_length[3]|max_length[255]|validateUser[username,password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => "Username or Password didn't match",
                ],
            ];

            if (!$this->validate($rules, $errors)) {

                return view('admin/login', [
                    "validation" => $this->validator,
                ]);
            } else {
                $model = new AdminModel();

                $user = $model->where('username', $this->request->getVar('username'))
                    ->first();

                // Stroing session values
                $this->setUserSession($user);

                // Redirecting to dashboard after login
                return redirect()->to(base_url('admin/dashboard'));
            }
        }
        return view('admin/login');
    }

    private function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'username' => $user['username'],
            'isLoggedIn' => true,
        ];

        $this->session->set($data);
        return true;
    }

    public function logout()
    {
        session()->destroy();
        return redirect(route: '/');
    }
}
