@extends('layouts.app')
@section('title', 'Tambah Penulis')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h6 class="fw-semibold mb-0">Tambah Penulis</h6>
    <a href="{{ route('penulis.index') }}" class="btn btn-sm" style="background:#f0f0f0;color:#555;">Kembali</a>
</div>
<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <form action="{{ route('penulis.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold" style="font-size:13px;">Nama Depan <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('nama_depan') is-invalid @enderror"
                        name="nama_depan" value="{{ old('nama_depan') }}" placeholder="Nama depan">
                    @error('nama_depan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold" style="font-size:13px;">Nama Belakang <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('nama_belakang') is-invalid @enderror"
                        name="nama_belakang" value="{{ old('nama_belakang') }}" placeholder="Nama belakang">
                    @error('nama_belakang')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold" style="font-size:13px;">Username <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('user_name') is-invalid @enderror"
                    name="user_name" value="{{ old('user_name') }}" placeholder="Username">
                @error('user_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold" style="font-size:13px;">Password <span class="text-danger">*</span></label>
                <input type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" placeholder="Minimal 8 karakter">
                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-4">
                <label class="form-label fw-semibold" style="font-size:13px;">Foto Profil</label>
                <input type="file" class="form-control @error('foto') is-invalid @enderror"
                    name="foto" accept="image/jpg,image/jpeg,image/png">
                <div class="form-text" style="font-size:12px;">Format JPG/PNG, maks 2MB. Jika kosong, foto default digunakan.</div>
                @error('foto')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="d-flex gap-2 justify-content-end">
                <a href="{{ route('penulis.index') }}" class="btn btn-sm" style="background:#f0f0f0;color:#555;">Batal</a>
                <button type="submit" class="btn btn-sm btn-success">Simpan Data</button>
            </div>
        </form>
    </div>
</div>
@endsection