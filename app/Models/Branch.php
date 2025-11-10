<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'level',
        'parent_id',
        'province_id',
        'city_id',
    ];

    /**
     * 🔹 Relasi ke parent (misal: cabang → provinsi)
     */
    public function parent()
    {
        return $this->belongsTo(Branch::class, 'parent_id');
    }

    /**
     * 🔹 Relasi ke anak (misal: provinsi → semua cabang di bawahnya)
     */
    public function children()
    {
        return $this->hasMany(Branch::class, 'parent_id');
    }

    /**
     * 🔹 Relasi ke provinsi (opsional)
     */
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    /**
     * 🔹 Relasi ke kota (opsional)
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * 🔹 Relasi ke semua user di cabang/provinsi/pusat ini
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * 🔹 Relasi ke semua member (dari MemberProfile)
     */
    public function members()
    {
        return $this->hasMany(MemberProfile::class);
    }
}
