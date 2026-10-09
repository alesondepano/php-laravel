<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table         = 'tasks';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $allowedFields = ['title', 'status', 'task_date', 'created_at'];

    public function forToday(?string $date = null): array
    {
        return $this->where('task_date', $date ?? date('Y-m-d'))
            ->orderBy('created_at', 'ASC')
            ->findAll();
    }

    public function orderedByDate(): array
    {
        return $this->orderBy('task_date', 'ASC')
            ->orderBy('created_at', 'ASC')
            ->findAll();
    }
}
