<?php

namespace App\Models;

use App\Models\Stock;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medicine extends Model
{
    use HasFactory;
    protected $fillable =[
        'subcategory_id',
        'name',
        'quantity'
    ];

    public function getAvailableQuantity()
    {
        return Stock::where('medicine_id', $this->id)
                           ->where('expiration_date', '>', date('Y-m-d'))
                           ->sum('quantity');
    }
    
    public function getTotalQuantity()
    {
        return Stock::where('medicine_id', $this->id)
                           ->sum('quantity');
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }
}
