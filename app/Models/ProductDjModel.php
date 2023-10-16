<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductDjModel extends Model
{
    protected $table = 'product_dj';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'code',
        'weightm',
        'weightg',
        'cogm',
        'pricenet',
        'priceusr',
        'discal',
        'reg_pricetag',
        'isproduction',
        'type',
        'purchasedt',
    ];
}