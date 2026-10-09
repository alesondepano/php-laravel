<?php

namespace App\Controllers;

use App\Models\UserModel;

class Profile extends BaseController
{
    public function index(): string
    {
        $user = new UserModel();

        return view('profile/index', [
            'title' => 'Profile',
            'page'  => 'profile',
            'user'  => $user->first(),
        ]);
    }
}
