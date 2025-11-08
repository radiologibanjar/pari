<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nik',
        'str_number',
        'profession',
        'place_of_work',
        'address',
        'phone',
        'photo'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
