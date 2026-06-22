<?php

namespace App\Models;

use CodeIgniter\Model;

class RoomModel extends Model
{
    protected $table            = 'rooms';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['room_type_id', 'room_number', 'status'];

    protected $useTimestamps = true;

    public function getRoomsWithTypes()
    {
        return $this->select('rooms.*, room_types.name as type_name, room_types.price')
                    ->join('room_types', 'room_types.id = rooms.room_type_id')
                    ->findAll();
    }
}
