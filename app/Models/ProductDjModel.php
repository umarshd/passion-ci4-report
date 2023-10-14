<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductLsModel extends Model
{
    protected $table = 'product_ls';
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