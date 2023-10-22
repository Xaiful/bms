<?php

namespace App\Models;

use App\Models\Unit;
use App\Models\Product;
use App\Models\RawMaterialsShop;
use App\Models\RawMaterialsStock;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RawMaterials extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'memo_no',
        'unit_price',
        'size',
        'type',
        'quantity',
        'unit_id',
    ];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
    public function RawMaterialsStock()
    {
        return $this->hasMany(RawMaterialsStock::class);
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function rawMaterialShops()
    {
        return $this->belongsToMany(RawMaterialsShop::class, 'raw_materials_raw_material_shop', 'raw_material_id', 'raw_materials_shop_id')
            ->withPivot('quantity')->withTimestamps(); // Include the 'quantity' field
            // ->with('created_at','updated_at');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_raw_materials_pivot')
            ->withPivot('quantity'); // Include the quantity column from the pivot table
    }
    public function packaging()
    {
        return $this->belongsToMany(Packaging::class, 'single_package_rawmaterials','packaging_id','raw_materials_id')
            ->withPivot('quantity');
    }

    
    
}
