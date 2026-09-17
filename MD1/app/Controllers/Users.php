<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index(): string
    {
        $users = [
            ['username' => 'aleson.depano', 'full_name' => 'Aleson Depano', 'role' => 'Administrator'],
            ['username' => 'althea', 'full_name' => 'Althea', 'role' => 'Manager'],
            ['username' => 'agapito', 'full_name' => 'Agapito', 'role' => 'Supervisor'],
            ['username' => 'mariel', 'full_name' => 'Mariel Santos', 'role' => 'Cashier'],
            ['username' => 'joshua', 'full_name' => 'Joshua Reyes', 'role' => 'Cashier'],
            ['username' => 'nicole', 'full_name' => 'Nicole Garcia', 'role' => 'Inventory Staff'],
            ['username' => 'carlo', 'full_name' => 'Carlo Mendoza', 'role' => 'Sales Staff'],
        ];

        return view('users/index', [
            'title' => 'User Accounts',
            'page'  => 'users',
            'users' => $users,
        ]);
    }
}
