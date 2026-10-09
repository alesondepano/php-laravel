<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Customers extends BaseController
{
    public function index(): string
    {
        $customers = new CustomerModel();

        return view('customers/index', [
            'title'     => 'Customer Accounts',
            'page'      => 'customers',
            'customers' => $customers->orderBy('id', 'DESC')->findAll(),
        ]);
    }

    public function newForm(): string
    {
        return view('customers/form', [
            'title'      => 'New Customer',
            'page'       => 'customers',
            'heading'    => 'New Customer',
            'customer'   => [],
            'formAction' => site_url('customers/create'),
        ]);
    }

    public function create()
    {
        $rules = [
            'full_name' => 'required|max_length[100]',
            'email'     => 'required|valid_email|max_length[100]',
            'phone'     => 'permit_empty|max_length[20]',
        ];

        if (! $this->validate($rules)) {
            return view('customers/form', [
                'title'      => 'New Customer',
                'page'       => 'customers',
                'heading'    => 'New Customer',
                'customer'   => [],
                'formAction' => site_url('customers/create'),
            ]);
        }

        $model = new CustomerModel();
        $model->insert([
            'full_name'  => trim((string) $this->request->getPost('full_name')),
            'email'      => trim((string) $this->request->getPost('email')),
            'phone'      => trim((string) $this->request->getPost('phone')),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(site_url('customers'));
    }

    public function edit(int $id): string
    {
        $model = new CustomerModel();
        $customer = $model->find($id);

        if ($customer === null) {
            throw PageNotFoundException::forPageNotFound('Customer not found.');
        }

        return view('customers/form', [
            'title'      => 'Edit Customer',
            'page'       => 'customers',
            'heading'    => 'Edit Customer',
            'customer'   => $customer,
            'formAction' => site_url('customers/update/' . $id),
        ]);
    }

    public function update(int $id)
    {
        $model = new CustomerModel();
        $customer = $model->find($id);

        if ($customer === null) {
            throw PageNotFoundException::forPageNotFound('Customer not found.');
        }

        $rules = [
            'full_name' => 'required|max_length[100]',
            'email'     => 'required|valid_email|max_length[100]',
            'phone'     => 'permit_empty|max_length[20]',
        ];

        if (! $this->validate($rules)) {
            return view('customers/form', [
                'title'      => 'Edit Customer',
                'page'       => 'customers',
                'heading'    => 'Edit Customer',
                'customer'   => $customer,
                'formAction' => site_url('customers/update/' . $id),
            ]);
        }

        $model->update($id, [
            'full_name' => trim((string) $this->request->getPost('full_name')),
            'email'     => trim((string) $this->request->getPost('email')),
            'phone'     => trim((string) $this->request->getPost('phone')),
        ]);

        return redirect()->to(site_url('customers'));
    }
}
