<?php

namespace App\Models;

use CodeIgniter\Model;

class StockAwalDjModel extends Model
{
    protected $table = 'stock_awal_dj';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'code'
    ];
}