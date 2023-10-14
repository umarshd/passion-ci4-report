<?php

namespace App\Models;

use CodeIgniter\Model;

class BuybackLsModel extends Model
{
    protected $table = 'buyback_ls';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'code',
        'type',
        'brand',
        'gem',
        'weight',
        'pricenet',
        'priceusr',
        'buybackdt',
    ];
}