<?php

namespace App\Models;

use App\Models\RawMaterials;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RawMaterialsStock extends Model
{
    use HasFactory;
    protected $fillable = [
        'rawmaterial_id',
        'unit_price',
        'quantity',
        'unit_id',
        'memo_no',
        'total',
        'created_at',
        'updated_at',
    ];
    
    public function rawmaterial()
    {
        return $this->belongsTo(RawMaterials::class)->with('created_at','updated_at');
    }
}
