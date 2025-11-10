@extends('layouts.guest')

@section('content')
<p class="login-box-msg">Lupa password Anda?</p>

<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <div class="input-group mb-3">
        <input type="email" name="email" class="form-control" placeholder="Masukkan email terdaftar" required>
        <div class="input-group-append"><div class="input-group-text"><span class="fas fa-envelope"></span></div></div>
    </div>
    <div class="row">
        <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Kirim Link Reset</button>
        </div>
    </div>
</form>

<p class="mt-3 text-center">
    <a href="{{ route('login') }}">Kembali ke login</a>
</p>
@endsection
