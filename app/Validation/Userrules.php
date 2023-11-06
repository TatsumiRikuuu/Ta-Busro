<?php

namespace App\Validation;

use App\Models\AdminModel;
use App\Models\UserModel;

class Userrules
{
    public function validateUser(string $str, string $fields, array $data)
    {
        $model = new AdminModel();
        $user = $model->where('username', $data['username'])
            ->first();

        if (!$user) {
            return false;
        }

        return password_verify($data['password'], $user['password']);
    }
}
