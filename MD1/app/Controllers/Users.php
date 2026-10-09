<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index(): string
    {
        $users = new UserModel();

        return view('users/index', [
            'title' => 'User Accounts',
            'page'  => 'users',
            'users' => $users->findAll(),
        ]);
    }
}
