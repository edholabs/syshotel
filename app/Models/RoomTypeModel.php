<?php

namespace App\Models;

use CodeIgniter\Model;

class RoomTypeModel extends Model
{
    protected $table            = 'room_types';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['name', 'description', 'price'];

    protected $useTimestamps = true;
}
