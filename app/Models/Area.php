<?php

namespace App\Models;

use App\Models\User;
use App\Models\SubDistrict;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Area extends Model
{
    use HasFactory;
    protected $fillable = ['name','start','end','sub_district_id'];
    
    public function subDistricts()
    {
        return $this->hasMany(SubDistrict::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class,'roles_devisions','area_id' ,'user_id');
    }

}
