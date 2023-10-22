<?php

namespace App\Models;

use App\Models\Unit;
use App\Models\Product;
use App\Models\RawMaterials;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SingleProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'quantity',
        'unit_id',
    ];
    public function rawMaterials()
    {
        return $this->belongsToMany(RawMaterials::class, 'single_product_rawmaterials','single_product_id','raw_materials_id')
            ->withPivot('quantity');
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
