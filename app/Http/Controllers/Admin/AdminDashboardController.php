<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Berita;
use App\Models\Pengumuman;
use App\Models\Ppdb;
use App\Models\KontakPesan;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_guru' => Guru::count(),
            'total_siswa' => Siswa::count(),
            'total_berita' => Berita::count(),
            'total_pengumuman' => Pengumuman::count(),
            'total_ppdb' => Ppdb::count(),
            'ppdb_pending' => Ppdb::where('status', 'pending')->count(),
            'total_users' => User::count(),
            'pesan_belum_dibaca' => KontakPesan::count(),
        ];

        $latestPpdb = Ppdb::latest()->take(5)->get();
        $latestBerita = Berita::latest()->take(5)->get();
        $latestKontak = KontakPesan::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'latestPpdb', 'latestBerita', 'latestKontak'));
    }
}
