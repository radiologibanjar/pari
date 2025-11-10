@extends('layouts.app')

@section('title', 'Beranda Anggota')

@section('content')
<div class="container py-4">

    {{-- Header selamat datang --}}
    <div class="text-center mb-5">
        <h2 class="fw-bold text-primary">Selamat Datang, {{ Auth::user()->name }} 👋</h2>
        <p class="text-muted mb-0">Anda login sebagai <strong>{{ ucfirst(Auth::user()->role) }}</strong></p>
    </div>

    {{-- Card statistik ringkas --}}
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4 h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="flex-shrink-0 me-3">
                        <i class="fa-solid fa-id-card fa-2x text-primary"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Nomor Induk Radiografer (NIR)</h6>
                        <h5 class="mb-0">{{ $member->nir ?? 'Belum diisi' }}</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4 h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="flex-shrink-0 me-3">
                        <i class="fa-solid fa-hospital-user fa-2x text-success"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Cabang</h6>
                        <h5 class="mb-0">{{ $member->branch->city->name ?? '-' }}</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4 h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="flex-shrink-0 me-3">
                        <i class="fa-solid fa-map fa-2x text-info"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Provinsi</h6>
                        <h5 class="mb-0">{{ $member->branch->province->name ?? '-' }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Seksi Diskusi / Pengumuman --}}
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-semibold text-primary">Diskusi & Informasi</h5>
                    <a href="#" class="btn btn-sm btn-outline-primary">Tulis Postingan</a>
                </div>
                <div class="card-body">
                    <p class="text-muted">Belum ada diskusi terbaru. Yuk mulai berdiskusi dengan rekan radiografer lainnya!</p>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white border-0">
                    <h6 class="fw-semibold text-primary mb-0">Pengumuman</h6>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-3">
                            <a href="#" class="text-decoration-none text-dark">
                                <strong>Rapat Akbar PARI 2025</strong>
                                <div class="small text-muted">10 November 2025</div>
                            </a>
                        </li>
                        <li class="mb-3">
                            <a href="#" class="text-decoration-none text-dark">
                                <strong>Pembaruan Sistem Keanggotaan</strong>
                                <div class="small text-muted">5 November 2025</div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-header bg-white border-0">
                    <h6 class="fw-semibold text-primary mb-0">Profil Singkat</h6>
                </div>
                <div class="card-body">
                    <p class="mb-1"><i class="fa-solid fa-envelope me-2 text-secondary"></i> {{ Auth::user()->email }}</p>
                    <p class="mb-1"><i class="fa-solid fa-phone me-2 text-secondary"></i> {{ $member->phone ?? '-' }}</p>
                    <p class="mb-0"><i class="fa-solid fa-map-marker-alt me-2 text-secondary"></i> {{ $member->address ?? '-' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
