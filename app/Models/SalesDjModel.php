<?php

namespace App\Models;

use CodeIgniter\Model;

class SalesDjModel extends Model
{
    protected $table = 'sales_dj';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'code',
        'weightm',
        'weightg',
        'cogm',
        'pricenet',
        'priceusr',
        'isproduction',
        'type',
        'salesdt',
    ];
}