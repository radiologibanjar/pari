@extends('layouts.app')

@section('title', 'Edit Profil Anggota')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Edit Profil</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('member.updateProfile') }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nomor HP</label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone', $member->phone) }}">
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tempat Lahir</label>
                                <input type="text" name="birth_place" class="form-control" value="{{ old('birth_place', $member->birth_place) }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" name="birth_date" class="form-control" value="{{ old('birth_date', $member->birth_date) }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <select name="gender" class="form-select">
                                <option value="">Pilih</option>
                                <option value="L" {{ old('gender', $member->gender) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="P" {{ old('gender', $member->gender) == 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea name="address" class="form-control" rows="3">{{ old('address', $member->address) }}</textarea>
                        </div>

                        <div class="text-end">
                            <a href="{{ route('member.profile') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
