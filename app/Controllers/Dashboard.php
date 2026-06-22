<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $totalTransactions = $db->table('transactions')->countAll();
        $totalGuests = $db->table('guests')->countAll();
        $totalServices = $db->table('services')->countAll();
        
        $totalRooms = $db->table('rooms')->countAll();
        $occupiedRooms = $db->table('rooms')->where('status', 'terisi')->countAllResults();
        $occupancyRate = ($totalRooms > 0) ? round(($occupiedRooms / $totalRooms) * 100) : 0;

        $data = [
            'title' => 'Dashboard',
            'totalTransactions' => $totalTransactions,
            'totalGuests' => $totalGuests,
            'totalServices' => $totalServices,
            'occupancyRate' => $occupancyRate
        ];
        return view('dashboard/index', $data);
    }
}
