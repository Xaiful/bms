<?php

namespace App\Models;

use App\Models\RawMaterials;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RawMaterialsShop extends Model
{
    use HasFactory;
    protected $fillable = [
        'shopeName',
        'address',
        'phone',
        'rawmaterial_id'
    ];
    
    public function rawMaterials()
    {
        return $this->belongsToMany(RawMaterials::class, 'raw_materials_raw_material_shop', 'raw_materials_shop_id', 'raw_material_id')->withTimestamps();;
    }



}
