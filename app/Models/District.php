<?php

namespace App\Models;

use App\Models\Devision;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class District extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'devision_id'
    ] ;
    public function devision()
    {
        return $this->belongsTo(Devision::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class,'roles_devisions','district_id' ,'user_id');
    }
    public function subDistricts()
    {
        return $this->hasMany(SubDistrict::class);
    }

}
