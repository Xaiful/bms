<?php

namespace App\Models;

use App\Models\Medicine;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'medicine_id',
        'quantity',
        'total',
    ];
    
    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }

}
