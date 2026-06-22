<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Guests extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'              => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'identity_number' => ['type' => 'VARCHAR', 'constraint' => '50'],
            'name'            => ['type' => 'VARCHAR', 'constraint' => '100'],
            'phone'           => ['type' => 'VARCHAR', 'constraint' => '20'],
            'address'         => ['type' => 'TEXT', 'null' => true],
            'created_at'      => ['type' => 'DATETIME', 'null' => true],
            'updated_at'      => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('guests');
    }

    public function down()
    {
        $this->forge->dropTable('guests');
    }
}
