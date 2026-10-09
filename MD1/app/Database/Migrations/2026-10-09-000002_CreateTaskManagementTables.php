<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTaskManagementTables extends Migration
{
    public function up()
    {
        if (! $this->db->tableExists('tasks')) {
            $this->forge->addField([
                'id' => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'auto_increment' => true,
                ],
                'title' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 150,
                ],
                'status' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 20,
                    'default'    => 'pending',
                ],
                'task_date' => [
                    'type' => 'DATE',
                ],
                'created_at' => [
                    'type' => 'DATETIME',
                ],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->createTable('tasks');
        }

        if (! $this->db->tableExists('users')) {
            $this->forge->addField([
                'id' => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'auto_increment' => true,
                ],
                'username' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 50,
                ],
                'full_name' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 100,
                ],
                'email' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 100,
                ],
                'created_at' => [
                    'type' => 'DATETIME',
                ],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addUniqueKey('username');
            $this->forge->createTable('users');
        } elseif (! $this->db->fieldExists('email', 'users')) {
            $this->forge->addColumn('users', [
                'email' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 100,
                    'default'    => '',
                ],
            ]);
        }
    }

    public function down()
    {
        $this->forge->dropTable('tasks', true);
    }
}
