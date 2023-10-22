<?php

namespace App\Models;

use App\Models\Product;
use App\Models\RawMaterials;
use App\Models\FinishedProducts;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unit extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',        
        'rawmaterial_id',        

    ];
    public function rawmaterial()
    {
        return $this->hasMany(RawMaterials::class);
    }  
    public function product()
    {
        return $this->hasMany(Product::class);
    }  

    public function finished()
    {
        return $this->hasMany(FinishedProducts::class);
    }

      
}
