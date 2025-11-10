<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberProfile extends Model
{
    use HasFactory;

     protected $fillable = [
        'user_id', 'branch_id', 'nir', 'str_number', 'sip_number', 'full_name',
        'gender', 'birth_place', 'birth_date', 'phone', 'email', 'address',
        'postal_code', 'education', 'institution', 'membership_type', 'status',
        'photo', 'document_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
