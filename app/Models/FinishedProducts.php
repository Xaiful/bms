<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FinishedProducts extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'packaging_id',
        'quantity',
        'unit_id',
    ];
    // protected $table = 'finished_products';
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
