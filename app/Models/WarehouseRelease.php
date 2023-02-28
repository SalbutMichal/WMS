<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseRelease extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'warehouse_id',
        'products_quantity',
    ];
}
