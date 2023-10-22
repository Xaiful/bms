<?php

namespace App\Models;

use App\Models\District;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Devision extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];
    public function districts()
    {
        return $this->hasMany(District::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class,'roles_devisions','devision_id' ,'user_id');
    }

}

