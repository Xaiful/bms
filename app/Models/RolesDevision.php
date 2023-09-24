<?php

namespace App\Models;

use App\Models\Area;
use App\Models\Devision;
use App\Models\District;
use App\Models\Warehouse;
use App\Models\SubDistrict;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RolesDevision extends Model
{
    use HasFactory;
    protected $table = 'roles_devisions';
    public function devision()
    {
        return $this->belongsTo(Devision::class);
    }
    public function district()
    {
        return $this->belongsTo(District::class);
    }
    public function subDistrict()
    {
        return $this->belongsTo(SubDistrict::class);
    }
    public function area()
    {
        return $this->belongsTo(Area::class);
    }
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }
}
