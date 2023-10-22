<?php

namespace App\Models;

use App\Models\Area;
use App\Models\Devision;
use App\Models\Warehouse;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function devisions()
    {
        return $this->belongsToMany(Devision::class, 'roles_devisions', 'user_id', 'devision_id');
    }

    public function districts()
    {
        return $this->belongsToMany(District::class, 'roles_devisions', 'user_id', 'district_id');
    }
    public function subDistricts()
    {
        return $this->belongsToMany(SubDistrict::class, 'roles_devisions', 'user_id','sub_district_id');
    } 
    public function areas()
    {
        return $this->belongsToMany(Area::class, 'roles_devisions', 'user_id','area_id');
    }
    public function warehouses()
    {
        return $this->belongsToMany(Warehouse::class, 'roles_devisions', 'user_id','warehouse_id');
    }
}
