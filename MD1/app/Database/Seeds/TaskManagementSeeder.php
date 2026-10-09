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
        $this->db->table('customers')->truncate();

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
            'username' => 'aleson.depano', 'full_name' => 'Aleson Axel D. De Pano', 'email' => 'aleson.depano@gmail.com', 'created_at' => $createdAt,
        ]);

        $this->db->table('customers')->insertBatch([
            ['full_name' => 'Aleson Axel D. De Pano', 'email' => 'aleson.depano@gmail.com', 'phone' => '09171234006', 'created_at' => $createdAt],
            ['full_name' => 'Miguel Angelo Reyes', 'email' => 'miguel.reyes@gmail.com', 'phone' => '09171234001', 'created_at' => $createdAt],
            ['full_name' => 'Samantha Nicole Cruz', 'email' => 'samantha.cruz@gmail.com', 'phone' => '09181234002', 'created_at' => $createdAt],
            ['full_name' => 'Joshua Patrick Santos', 'email' => 'joshua.santos@gmail.com', 'phone' => '09191234003', 'created_at' => $createdAt],
            ['full_name' => 'Andrea Mae Villanueva', 'email' => 'andrea.villanueva@gmail.com', 'phone' => '09201234004', 'created_at' => $createdAt],
            ['full_name' => 'Gabriel Luis Mendoza', 'email' => 'gabriel.mendoza@gmail.com', 'phone' => '09211234005', 'created_at' => $createdAt],
        ]);
    }
}
