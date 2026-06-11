@extends('layouts.publik')
@section('title', 'Blog Kami - Beranda')

{{-- KONTEN KIRI: daftar artikel --}}
@section('content')

@forelse($artikel as $item)
<div class="artikel-card">
    <img src="{{ asset('storage/gambar/' . $item->gambar) }}"
        alt="{{ $item->judul }}">
    <div class="body">
        <span class="kategori-badge">{{ $item->kategori->nama_kategori }}</span>
        <h2>{{ $item->judul }}</h2>
        <div class="meta">
            <span class="avatar">{{ strtoupper(substr($item->penulis->nama_depan, 0, 1)) }}</span>
            {{ $item->penulis->nama_depan }} {{ $item->penulis->nama_belakang }}
            &nbsp;•&nbsp; {{ $item->hari_tanggal }}
        </div>
        <p class="ringkasan">
            {{ Str::limit(strip_tags($item->isi), 180) }}
        </p>
        <a href="{{ route('publik.detail', $item->id) }}" class="btn-baca">
            Baca Selengkapnya &rarr;
        </a>
    </div>
</div>
@empty
<div class="widget text-center py-4">
    <p class="text-muted">
        @if($kategoriAktif)
        Belum ada artikel dalam kategori <strong>{{ $kategoriAktif->nama_kategori }}</strong>.
        @else
        Belum ada artikel.
        @endif
    </p>
</div>
@endforelse

@endsection

{{-- SIDEBAR KANAN: widget kategori --}}
@section('sidebar')

<div class="widget">
    <h5>Kategori Artikel</h5>

    {{-- Tombol "Semua Artikel" --}}
    <a href="{{ route('publik.index') }}"
        class="kategori-item {{ is_null($kategoriAktif) ? 'active' : '' }}">
        Semua Artikel
        <span class="badge-count">{{ $totalArtikel }}</span>
    </a>

    {{-- Daftar kategori --}}
    @foreach($semuaKategori as $kat)
    <a href="{{ route('publik.kategori', $kat->id) }}"
        class="kategori-item {{ $kategoriAktif && $kategoriAktif->id == $kat->id ? 'active' : '' }}">
        {{ $kat->nama_kategori }}
        <span class="badge-count">{{ $kat->artikel_count }}</span>
    </a>
    @endforeach
</div>

@endsection