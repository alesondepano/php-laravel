<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TaskManagementSeeder extends Seeder
{
    public function run()
    {
        $today    = date('Y-m-d');
        $yesterday = date('Y-m-d', strtotime('-1 day'));
        $tomorrow = date('Y-m-d', strtotime('+1 day'));
        $createdAt = date('Y-m-d H:i:s');

        $this->db->table('tasks')->truncate();
        $this->db->table('users')->truncate();

        $this->db->table('tasks')->insertBatch([
            ['title' => 'Review morning sales report', 'status' => 'completed', 'task_date' => $today, 'created_at' => $createdAt],
            ['title' => 'Confirm team availability', 'status' => 'pending', 'task_date' => $today, 'created_at' => $createdAt],
            ['title' => 'Prepare client presentation', 'status' => 'in progress', 'task_date' => $today, 'created_at' => $createdAt],
            ['title' => 'Archive last week invoices', 'status' => 'completed', 'task_date' => $yesterday, 'created_at' => $createdAt],
            ['title' => 'Check inventory notes', 'status' => 'pending', 'task_date' => $yesterday, 'created_at' => $createdAt],
            ['title' => 'Plan next sprint', 'status' => 'pending', 'task_date' => $tomorrow, 'created_at' => $createdAt],
            ['title' => 'Send weekly status email', 'status' => 'pending', 'task_date' => $tomorrow, 'created_at' => $createdAt],
            ['title' => 'Review project documentation', 'status' => 'pending', 'task_date' => date('Y-m-d', strtotime('+2 days')), 'created_at' => $createdAt],
        ]);

        $this->db->table('users')->insert([
            'username'  => 'aleson.depano',
            'full_name' => 'Aleson Depano',
            'email'     => 'aleson.depano@example.com',
            'created_at' => $createdAt,
        ]);
    }
}
