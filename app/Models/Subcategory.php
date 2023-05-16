<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Medicine;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subcategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category_id'
    ] ;

    public function category()
{
    return $this->belongsTo(Category::class);
}

public function medicine()
{
    return $this->hasMany(Medicine::class);
}
}
