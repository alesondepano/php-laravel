<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PosSeeder extends Seeder
{
    public function run()
    {
        $createdAt = date('Y-m-d H:i:s');

        $this->db->table('customers')->insertBatch([
            ['full_name' => 'Maria Santos', 'email' => 'maria.santos@example.com', 'phone' => '0917 123 4567', 'created_at' => $createdAt],
            ['full_name' => 'John Reyes', 'email' => 'john.reyes@example.com', 'phone' => '0918 234 5678', 'created_at' => $createdAt],
            ['full_name' => 'Angela Cruz', 'email' => 'angela.cruz@example.com', 'phone' => '0919 345 6789', 'created_at' => $createdAt],
            ['full_name' => 'Paolo Garcia', 'email' => 'paolo.garcia@example.com', 'phone' => '0920 456 7890', 'created_at' => $createdAt],
            ['full_name' => 'Sofia Mendoza', 'email' => 'sofia.mendoza@example.com', 'phone' => '0921 567 8901', 'created_at' => $createdAt],
        ]);

        $this->db->table('users')->insertBatch([
            ['username' => 'aleson.depano', 'full_name' => 'Aleson Depano', 'created_at' => $createdAt],
            ['username' => 'althea', 'full_name' => 'Althea', 'created_at' => $createdAt],
            ['username' => 'agapito', 'full_name' => 'Agapito', 'created_at' => $createdAt],
            ['username' => 'mariel', 'full_name' => 'Mariel Santos', 'created_at' => $createdAt],
            ['username' => 'joshua', 'full_name' => 'Joshua Reyes', 'created_at' => $createdAt],
            ['username' => 'nicole', 'full_name' => 'Nicole Garcia', 'created_at' => $createdAt],
            ['username' => 'carlo', 'full_name' => 'Carlo Mendoza', 'created_at' => $createdAt],
        ]);
    }
}
