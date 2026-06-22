<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Rooms extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'           => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'room_type_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'room_number'  => ['type' => 'VARCHAR', 'constraint' => '20'],
            'status'       => ['type' => 'ENUM("tersedia","terisi","kotor","perbaikan")', 'default' => 'tersedia'],
            'created_at'   => ['type' => 'DATETIME', 'null' => true],
            'updated_at'   => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('room_type_id', 'room_types', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('rooms');
    }

    public function down()
    {
        $this->forge->dropTable('rooms');
    }
}
