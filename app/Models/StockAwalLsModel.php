<?php

namespace App\Models;

use CodeIgniter\Model;

class StockAwalLsModel extends Model
{
    protected $table = 'stock_awal_ls';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'code'
    ];
}