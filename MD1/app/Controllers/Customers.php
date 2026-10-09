<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customers extends BaseController
{
    public function index(): string
    {
        $customers = new CustomerModel();

        return view('customers/index', [
            'title'     => 'Customer Accounts',
            'page'      => 'customers',
            'customers' => $customers->findAll(),
        ]);
    }
}
