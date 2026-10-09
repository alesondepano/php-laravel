<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Pages extends BaseController
{
    public function index(): string
    {
        $tasks = new TaskModel();

        return view('pages/home', [
            'title'      => 'Welcome',
            'page'       => 'home',
            'tasks'      => $tasks->forToday(),
            'today'      => date('F j, Y'),
            'todayCount' => count($tasks->forToday()),
        ]);
    }

    public function about(): string
    {
        return view('pages/about', [
            'title' => 'About',
            'page'  => 'about',
        ]);
    }
}
