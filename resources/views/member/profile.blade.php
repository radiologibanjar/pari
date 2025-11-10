@extends('layouts.app')

@section('title', 'Profil Anggota')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Profil Anggota</h5>
        </div>

        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-3 text-center">
                    <img src="{{ optional($user->profile)->photo ? asset('storage/'. $user->profile->photo) : asset('images/default-avatar.png') }}"
                    class="img-fluid rounded-circle shadow-sm mb-3"
                    style="width: 120px; height: 120px; object-fit: cover;"
                    alt="Foto Profil">

                    <p><strong>{{ $user->profile->full_name }}</strong></p>
                    <p class="text-muted">{{ ucfirst($user->role) }}</p>
                </div>

                <div class="col-md-9">
                    <table class="table table-sm table-bordered">
                        <tr><th>Email Pribadi</th><td>{{ optional($user->profile)->email ?? '-' }}</td></tr>
                        <tr><th>No. HP</th><td>{{ optional($user->profile)->phone ?? '-' }}</td></tr>
                        <tr><th>Tempat, Tanggal Lahir</th><td>{{ optional($user->profile)->birth_place ?? '-' }}, {{ optional($user->profile)->birth_date ?? '-' }}</td></tr>
                        <tr><th>Pendidikan</th><td>{{ optional($user->profile)->education ?? '-' }}</td></tr>
                        <tr><th>Institusi</th><td>{{ optional($user->profile)->institution ?? '-' }}</td></tr>
                        <tr><th>Status Keanggotaan</th><td>{{ ucfirst(optional($user->profile)->membership_type ?? '-') }}</td></tr>
                        <tr><th>Status Verifikasi</th><td>{{ ucfirst(optional($user->profile)->status ?? '-') }}</td></tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
