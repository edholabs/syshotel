<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TransactionDetails extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'             => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'transaction_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'service_id'     => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'qty'            => ['type' => 'INT', 'constraint' => 11, 'default' => 1],
            'price'          => ['type' => 'DECIMAL', 'constraint' => '10,2'],
            'subtotal'       => ['type' => 'DECIMAL', 'constraint' => '12,2'],
            'created_at'     => ['type' => 'DATETIME', 'null' => true],
            'updated_at'     => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('transaction_id', 'transactions', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('service_id', 'services', 'id', 'RESTRICT', 'CASCADE');
        $this->forge->createTable('transaction_details');
    }

    public function down()
    {
        $this->forge->dropTable('transaction_details');
    }
}
