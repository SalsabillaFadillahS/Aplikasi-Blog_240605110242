<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\KategoriArtikel;

class PublikController extends Controller
{
    /**
     * Halaman utama — tampilkan 5 artikel terbaru
     * Jika ada parameter kategori, filter berdasarkan kategori
     */
    public function index()
    {
        $artikel = Artikel::with('penulis', 'kategori')
            ->orderBy('id', 'desc')
            ->limit(5)
            ->get();

        $semuaKategori = KategoriArtikel::withCount('artikel')
            ->orderBy('nama_kategori', 'asc')
            ->get();

        $totalArtikel = Artikel::count();
        $kategoriAktif = null;

        return view('publik.index', compact(
            'artikel', 'semuaKategori', 'totalArtikel', 'kategoriAktif'
        ));
    }

    /**
     * Filter artikel berdasarkan kategori
     */
    public function kategori(string $id)
    {
        $kategoriAktif = KategoriArtikel::findOrFail($id);

        $artikel = Artikel::with('penulis', 'kategori')
            ->where('id_kategori', $id)
            ->orderBy('id', 'desc')
            ->limit(5)
            ->get();

        $semuaKategori = KategoriArtikel::withCount('artikel')
            ->orderBy('nama_kategori', 'asc')
            ->get();

        $totalArtikel = Artikel::count();

        return view('publik.index', compact(
            'artikel', 'semuaKategori', 'totalArtikel', 'kategoriAktif'
        ));
    }

    /**
     * Halaman detail artikel + 5 artikel terkait dari kategori yang sama
     */
    public function detail(string $id)
    {
        $artikel = Artikel::with('penulis', 'kategori')->findOrFail($id);

        $artikelTerkait = Artikel::with('penulis', 'kategori')
            ->where('id_kategori', $artikel->id_kategori)
            ->where('id', '!=', $artikel->id)
            ->orderBy('id', 'desc')
            ->limit(5)
            ->get();

        return view('publik.detail', compact('artikel', 'artikelTerkait'));
    }
}
