<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class MemberController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        // ambil detail lengkap beserta relasi
        $user = User::with([
            'profile.branch.city',
            'profile.branch.province',
            'branch.city',
            'branch.province',
        ])->find($user->id);

        return view('member.profile', compact('user'));
    }
}
