<?php

namespace App\Models;

use App\Models\Unit;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Packaging extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'size',
        'quantity',
        'unit_id',
    ];
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'finished_products','packaging_id','product_id')
            ->withPivot('quantity');
    }
    public function rawMaterials()
    {
        return $this->belongsToMany(RawMaterials::class, 'single_package_rawmatrials','packaging_id','raw_materials_id')
            ->withPivot('quantity');
    }
}
