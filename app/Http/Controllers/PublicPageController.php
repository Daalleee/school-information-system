<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Pengumuman;
use App\Models\Galeri;
use App\Models\Guru;
use App\Models\ProfilSekolah;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;

class PublicPageController extends Controller
{
    // Landing page
    public function home()
    {
        $berita = Berita::with('kategori')->latest()->take(3)->get();
        $galeri = Galeri::latest()->take(4)->get();
        $pengumuman = Pengumuman::latest()->take(3)->get();
        
        return view('welcome', compact('berita', 'galeri', 'pengumuman'));
    }

    // Profil page
    public function profil()
    {
        $profil = ProfilSekolah::first();
        return view('profil', compact('profil'));
    }

    // Guru page
    public function guru()
    {
        $guruList = Guru::latest()->get();
        return view('guru', compact('guruList'));
    }

    // Fasilitas page
    public function fasilitas()
    {
        return view('fasilitas');
    }

    // Berita page
    public function berita(Request $request)
    {
        $query = Berita::with(['user', 'kategori'])->latest();
        
        if ($request->filled('search')) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }
        
        if ($request->filled('kategori')) {
            $query->where('kategori_id', $request->kategori);
        }
        
        $berita = $query->paginate(9);
        $kategoris = KategoriBerita::all();
        
        return view('berita', compact('berita', 'kategoris'));
    }

    // Detail berita
    public function beritaDetail($slug)
    {
        $berita = Berita::with(['user', 'kategori', 'komentars'])->where('slug', $slug)->firstOrFail();
        return view('berita-detail', compact('berita'));
    }

    // Pengumuman page
    public function pengumuman()
    {
        $pengumumanList = Pengumuman::latest()->paginate(10);
        return view('pengumuman', compact('pengumumanList'));
    }

    // Galeri page
    public function galeri(Request $request)
    {
        $query = Galeri::latest();
        
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }
        
        $galeriList = $query->paginate(12);
        return view('galeri', compact('galeriList'));
    }

    // PPDB page
    public function ppdb()
    {
        return view('ppdb');
    }

    // Kemitraan page
    public function kemitraan()
    {
        return view('kemitraan');
    }

    // Kontak page
    public function kontak()
    {
        return view('kontak');
    }
}
