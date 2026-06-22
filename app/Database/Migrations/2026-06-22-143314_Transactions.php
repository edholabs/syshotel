<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transactions extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'               => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'invoice_number'   => ['type' => 'VARCHAR', 'constraint' => '50'],
            'guest_id'         => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'company_id'       => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'room_id'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'user_id'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'check_in_date'    => ['type' => 'DATETIME'],
            'check_out_date'   => ['type' => 'DATETIME', 'null' => true],
            'total_room_price' => ['type' => 'DECIMAL', 'constraint' => '12,2', 'default' => 0],
            'total_service'    => ['type' => 'DECIMAL', 'constraint' => '12,2', 'default' => 0],
            'grand_total'      => ['type' => 'DECIMAL', 'constraint' => '12,2', 'default' => 0],
            'status'           => ['type' => 'ENUM("check_in","check_out","canceled")', 'default' => 'check_in'],
            'created_at'       => ['type' => 'DATETIME', 'null' => true],
            'updated_at'       => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('guest_id', 'guests', 'id', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('company_id', 'companies', 'id', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('room_id', 'rooms', 'id', 'RESTRICT', 'CASCADE');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'RESTRICT', 'CASCADE');
        $this->forge->createTable('transactions');
    }

    public function down()
    {
        $this->forge->dropTable('transactions');
    }
}
