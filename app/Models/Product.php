<?php

namespace App\Models;

use App\Models\Unit;
use App\Models\ProductStock;
use App\Models\RawMaterials;
use App\Models\WarehouseProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'quantity',
        'unit_id',
    ];
    public function rawMaterials()
    {
        return $this->belongsToMany(RawMaterials::class, 'product_raw_materials_pivot')
            ->withPivot('quantity');
    }
    public function productStock()
    {
        return $this->hasMany(ProductStock::class);
    }

    
    public function warehouses()
    {
        return $this->belongsToMany(Warehouse::class,'warehouses_products','product_id','warehouse_id')
                    ->using(WarehouseProduct::class)
                    ->withPivot(['quantity', 'damage', 'status'])
                    ->withTimestamps();
    }

    
    // public function getWarehousePivotData($warehouseId)
    // {
    //     return $this->warehouses->where('id', $warehouseId)->last()->pivot;
    // }

    // public function getWarehousePivotData()
    // {
    //     return $this->belongsToMany(Product::class)->withPivot('quantity', 'damage');
    // }


    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
