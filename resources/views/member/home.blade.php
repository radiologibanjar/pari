@extends('layouts.app')

@section('content')
<div class="text-center">
    <h4>Selamat datang, {{ Auth::user()->name }}</h4>
    <p>Ini halaman komunitas anggota.</p>

    @if(in_array(Auth::user()->role, ['superadmin','admin_pusat','admin_provinsi','admin_cabang']))
        <a href="{{ route('admin.dashboard') }}" class="btn btn-warning">
            <i class="fas fa-tools"></i> Masuk ke Dashboard Admin
        </a>
    @endif
</div>
@endsection
