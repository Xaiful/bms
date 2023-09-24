<?php

namespace App\Models;

use App\Models\Area;
use App\Models\District;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubDistrict extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'district_id'
    ] ;

    public function district()
    {
        return $this->belongsTo(District::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class,'roles_devisions','sub_district_id' ,'user_id');
    }
    public function areas()
    {
        return $this->hasMany(Area::class);
    }
}
