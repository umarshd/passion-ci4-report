<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductLsModel extends Model
{
    protected $table = 'product_ls';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'code',
        'type',
        'brand',
        'gem',
        'weight',
        'pricenet',
        'priceusr',
        'purchasedt',
    ];
}