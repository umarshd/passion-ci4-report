<?php

namespace App\Models;

use CodeIgniter\Model;

class BuybackDjModel extends Model
{
    protected $table = 'buyback_dj';
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
        'buybackdt',
    ];
}