<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Tasks extends BaseController
{
    public function index(): string
    {
        $tasks = new TaskModel();

        return view('tasks/index', [
            'title' => 'Task List',
            'page'  => 'tasks',
            'tasks' => $tasks->orderedByDate(),
        ]);
    }
}
