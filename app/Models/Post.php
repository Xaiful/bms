<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'price',
        'images',
        'status'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class,'posts_categories','post_id','category_id');
    }


    public function getImagesAttribute($value)
    {
        $values = [];
        if ($value) {
            foreach (json_decode($value) as $image) {
                $values[] = asset('storage/'.$image);
            }
            return $values;
        }

        return [];
    }

    public function setImagesAttribute($value)
    {
        $this->attributes['images'] = json_encode($value);
    }
}
