@extends('layouts.guest')

@section('title', 'Login - Sistem Informasi Anggota PARI')

@section('content')
<div class="d-flex align-items-center justify-content-center min-vh-100 bg-light" 
     style="background: linear-gradient(135deg, #e3f2fd 0%, #e0f7fa 100%);">
  <div class="card shadow-lg border-0 rounded-4 p-4" style="max-width: 420px; width: 100%;">
    <div class="text-center mb-4">
      <h2 class="fw-bold text-primary">Selamat Datang</h2>
      <p class="text-muted mb-0">Sistem Informasi Anggota PARI</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <div class="mb-3">
        <label for="email" class="form-label">Alamat Email</label>
        <input type="email" name="email" id="email" 
               class="form-control form-control-lg rounded-3 @error('email') is-invalid @enderror"
               value="{{ old('email') }}" placeholder="nama@contoh.com" required autofocus>
        @error('email')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Kata Sandi</label>
        <div class="input-group input-group-lg">
          <input type="password" name="password" id="password"
                 class="form-control rounded-start-3 @error('password') is-invalid @enderror"
                 placeholder="••••••••" required>
          <button type="button" class="btn btn-outline-secondary rounded-end-3" 
                  onclick="togglePassword()">
            <i class="fa-solid fa-eye"></i>
          </button>
        </div>
        @error('password')
          <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
      </div>

      <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="remember" id="remember">
          <label class="form-check-label" for="remember">
            Ingat saya
          </label>
        </div>
        @if (Route::has('password.request'))
          <a href="{{ route('password.request') }}" class="text-decoration-none small text-primary">
            Lupa Password?
          </a>
        @endif
      </div>

      <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold rounded-3 shadow-sm">
        Masuk
      </button>

      <div class="text-center mt-4">
        <p class="text-muted mb-1">Belum punya akun?</p>
        <a href="{{ route('register') }}" class="fw-semibold text-primary text-decoration-none">
          Daftar Sekarang
        </a>
      </div>
    </form>
  </div>
</div>

<script>
function togglePassword() {
  const input = document.getElementById('password');
  const icon = event.currentTarget.querySelector('i');
  input.type = input.type === 'password' ? 'text' : 'password';
  icon.classList.toggle('fa-eye');
  icon.classList.toggle('fa-eye-slash');
}
</script>
@endsection
