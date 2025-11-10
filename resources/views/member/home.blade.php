@extends('layouts.app')

@section('title', 'Beranda Member')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">

            {{-- Kartu sambutan --}}
            <div class="card shadow-lg border-0 rounded-4 mb-4">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h3 class="fw-bold mb-1 text-primary">Halo, {{ $user->name ?? 'Member' }} 👋</h3>
                        <p class="text-muted mb-0">Selamat datang di sistem keanggotaan PARI</p>
                    </div>
                    <div>
                        <i class="fas fa-user-circle fa-4x text-secondary"></i>
                    </div>
                </div>
            </div>

            {{-- Info profil --}}
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-light border-0 rounded-top-4">
                    <h5 class="mb-0 fw-semibold"><i class="fas fa-id-card me-2 text-primary"></i> Profil Singkat</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Nama Lengkap:</strong>
                            <p class="text-muted mb-0">{{ $user->name }}</p>
                        </div>
                        <div class="col-md-6">
                            <strong>Email:</strong>
                            <p class="text-muted mb-0">{{ $user->email }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Tanggal Bergabung:</strong>
                            <p class="text-muted mb-0">{{ $user->created_at->format('d F Y') }}</p>
                        </div>
                        <div class="col-md-6">
                            <strong>Status:</strong>
                            <span class="badge bg-success rounded-pill">Aktif</span>
                        </div>
                    </div>

                    <div class="text-end">
                        <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-edit me-1"></i> Edit Profil
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
