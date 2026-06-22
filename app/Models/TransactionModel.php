<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table            = 'transactions';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'invoice_number', 'guest_id', 'company_id', 'room_id', 'user_id',
        'check_in_date', 'check_out_date', 'total_room_price', 'total_service',
        'grand_total', 'status'
    ];
    protected $useTimestamps = true;

    public function getTransactions()
    {
        return $this->select('transactions.*, guests.name as guest_name, rooms.room_number, users.name as user_name')
                    ->join('guests', 'guests.id = transactions.guest_id', 'left')
                    ->join('rooms', 'rooms.id = transactions.room_id')
                    ->join('users', 'users.id = transactions.user_id')
                    ->orderBy('transactions.created_at', 'DESC')
                    ->findAll();
    }
}
