<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Users extends BaseController
{
    public function index(): string
    {
        $users = new UserModel();

        return view('users/index', [
            'title' => 'User Accounts',
            'page'  => 'users',
            'users' => $users->orderBy('id', 'DESC')->findAll(),
        ]);
    }

    public function newForm(): string
    {
        return view('users/form', [
            'title'      => 'New User',
            'page'       => 'users',
            'heading'    => 'New User',
            'user'       => [],
            'formAction' => site_url('users/create'),
        ]);
    }

    public function create()
    {
        $rules = [
            'username'  => 'required|max_length[50]',
            'full_name' => 'required|max_length[100]',
            'email'     => 'permit_empty|valid_email|max_length[100]',
        ];

        if (! $this->validate($rules)) {
            return view('users/form', [
                'title'      => 'New User',
                'page'       => 'users',
                'heading'    => 'New User',
                'user'       => [],
                'formAction' => site_url('users/create'),
            ]);
        }

        $model = new UserModel();
        $username = trim((string) $this->request->getPost('username'));

        if ($model->where('username', $username)->first() !== null) {
            return $this->userFormWithError('New User', [], site_url('users/create'), 'username', 'Username must be unique.');
        }

        $model->insert([
            'username'   => $username,
            'full_name'  => trim((string) $this->request->getPost('full_name')),
            'email'      => trim((string) $this->request->getPost('email')),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(site_url('users'));
    }

    public function edit(int $id): string
    {
        $model = new UserModel();
        $user = $model->find($id);

        if ($user === null) {
            throw PageNotFoundException::forPageNotFound('User not found.');
        }

        return view('users/form', [
            'title'      => 'Edit User',
            'page'       => 'users',
            'heading'    => 'Edit User',
            'user'       => $user,
            'formAction' => site_url('users/update/' . $id),
        ]);
    }

    public function update(int $id)
    {
        $model = new UserModel();
        $user = $model->find($id);

        if ($user === null) {
            throw PageNotFoundException::forPageNotFound('User not found.');
        }

        $rules = [
            'username'  => 'required|max_length[50]',
            'full_name' => 'required|max_length[100]',
            'email'     => 'permit_empty|valid_email|max_length[100]',
            'avatar'    => 'permit_empty|is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]|max_size[avatar,2048]',
        ];

        if (! $this->validate($rules)) {
            return view('users/form', [
                'title'      => 'Edit User',
                'page'       => 'users',
                'heading'    => 'Edit User',
                'user'       => $user,
                'formAction' => site_url('users/update/' . $id),
            ]);
        }

        $username = trim((string) $this->request->getPost('username'));
        $duplicate = $model->where('username', $username)->where('id !=', $id)->first();

        if ($duplicate !== null) {
            return $this->userFormWithError('Edit User', $user, site_url('users/update/' . $id), 'username', 'Username must be unique.');
        }

        $data = [
            'username'  => $username,
            'full_name' => trim((string) $this->request->getPost('full_name')),
            'email'     => trim((string) $this->request->getPost('email')),
        ];

        $avatar = $this->request->getFile('avatar');

        if ($avatar !== null && $avatar->isValid() && ! $avatar->hasMoved()) {
            $uploadDirectory = FCPATH . 'uploads/avatars';

            if (! is_dir($uploadDirectory)) {
                mkdir($uploadDirectory, 0755, true);
            }

            $temporaryName = 'tmp_' . $avatar->getRandomName();
            $temporaryPath = $uploadDirectory . DIRECTORY_SEPARATOR . $temporaryName;
            $avatar->move($uploadDirectory, $temporaryName);

            $storedName = 'avatar_' . $avatar->getRandomName();
            $storedPath = $uploadDirectory . DIRECTORY_SEPARATOR . $storedName;

            service('image')
                ->withFile($temporaryPath)
                ->fit(300, 300, 'center')
                ->save($storedPath);

            if (is_file($temporaryPath)) {
                unlink($temporaryPath);
            }

            $data['avatar'] = $storedName;
        }

        $model->update($id, $data);

        return redirect()->to(site_url('users'));
    }

    private function userFormWithError(string $heading, array $user, string $formAction, string $field, string $message): string
    {
        service('validation')->setError($field, $message);

        return view('users/form', [
            'title'      => $heading,
            'page'       => 'users',
            'heading'    => $heading,
            'user'       => $user,
            'formAction' => $formAction,
        ]);
    }
}
