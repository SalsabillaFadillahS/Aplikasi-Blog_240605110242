@extends('layouts.publik')
@section('title', $artikel->judul . ' - Blog Kami')

{{-- KONTEN KIRI: isi artikel lengkap --}}
@section('content')

{{-- Breadcrumb --}}
<nav style="font-size:13px; color:#999; margin-bottom:20px;">
    <a href="{{ route('publik.index') }}" style="color:#2e7d32; text-decoration:none;">Beranda</a>
    <span style="margin:0 6px;">/</span>
    <a href="{{ route('publik.kategori', $artikel->id_kategori) }}"
        style="color:#2e7d32; text-decoration:none;">
        {{ $artikel->kategori->nama_kategori }}
    </a>
    <span style="margin:0 6px;">/</span>
    <span style="color:#333;">{{ Str::limit($artikel->judul, 40) }}</span>
</nav>

<div class="artikel-card">
    {{-- Gambar artikel --}}
    <img src="{{ asset('storage/gambar/' . $artikel->gambar) }}"
        alt="{{ $artikel->judul }}">

    <div class="body">
        {{-- Badge kategori --}}
        <span class="kategori-badge">{{ $artikel->kategori->nama_kategori }}</span>

        {{-- Judul --}}
        <h2>{{ $artikel->judul }}</h2>

        {{-- Meta penulis + tanggal --}}
        <div class="d-flex align-items-center gap-2 mb-3">
            <span class="avatar" style="width:32px;height:32px;background:#2e7d32;color:#fff;
                border-radius:50%;display:inline-flex;align-items:center;
                justify-content:center;font-size:13px;font-weight:700;">
                {{ strtoupper(substr($artikel->penulis->nama_depan, 0, 1)) }}
            </span>
            <div>
                <div style="font-size:13px;font-weight:600;">{{ $artikel->penulis->nama_depan }} {{ $artikel->penulis->nama_belakang }}</div>
                <div style="font-size:12px;color:#999;">{{ $artikel->hari_tanggal }}</div>
            </div>
        </div>

        {{-- Isi artikel --}}
        <div style="font-size:15px;color:#333;line-height:1.85;text-align:justify;">
            {!! nl2br(e($artikel->isi)) !!}
        </div>

        {{-- Tombol kembali --}}
        <div style="margin-top:28px;">
            <a href="{{ route('publik.index') }}"
                style="font-size:13px;color:#2e7d32;text-decoration:none;">
                &larr; Kembali ke Beranda
            </a>
        </div>
    </div>
</div>

@endsection

{{-- SIDEBAR KANAN: widget artikel terkait --}}
@section('sidebar')

<div class="widget">
    <h5>Artikel Terkait</h5>

    @forelse($artikelTerkait as $item)
    <div class="terkait-item">
        <img src="{{ asset('storage/gambar/' . $item->gambar) }}"
            alt="{{ $item->judul }}">
        <div class="info">
            <a href="{{ route('publik.detail', $item->id) }}">
                {{ Str::limit($item->judul, 55) }}
            </a>
            <div class="tgl">{{ $item->hari_tanggal }}</div>
        </div>
    </div>
    @empty
    <p class="text-muted" style="font-size:13px;">
        Tidak ada artikel terkait.
    </p>
    @endforelse
</div>

@endsection