<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionDetailModel extends Model
{
    protected $table            = 'transaction_details';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['transaction_id', 'service_id', 'qty', 'price', 'subtotal'];
    protected $useTimestamps = true;

    public function getDetails($transaction_id)
    {
        return $this->select('transaction_details.*, services.name as service_name')
                    ->join('services', 'services.id = transaction_details.service_id')
                    ->where('transaction_id', $transaction_id)
                    ->findAll();
    }
}
