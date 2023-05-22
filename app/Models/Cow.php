<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Medicine;
use App\Models\Subcategory;
use App\Models\FeedCalculation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cow extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'age',
        'gender',
        'weight',
        'color',
        'importer'
    ];

    public function medicines()
    {
        return $this->belongsToMany(Medicine::class)
            ->withPivot('quantity')
            ->withTimestamps();
    }

}
