<?php

namespace App\Models;

use CodeIgniter\Model;

class SalesLsModel extends Model
{
    protected $table = 'sales_ls';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'type',
        'brand',
        'gem',
        'weight',
        'pricenet',
        'priceusr',
        'salesdt',
    ];
}