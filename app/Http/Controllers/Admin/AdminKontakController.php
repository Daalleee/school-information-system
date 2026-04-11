<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KontakPesan;
use Illuminate\Http\Request;

class AdminKontakController extends Controller
{
    public function index(Request $request)
    {
        $query = KontakPesan::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('pesan', 'like', "%{$search}%");
            });
        }

        $pesan = $query->latest()->paginate(15)->withQueryString();

        return view('admin.kontak.index', compact('pesan'));
    }

    public function show(KontakPesan $kontakPesan)
    {
        return view('admin.kontak.show', compact('kontakPesan'));
    }

    public function markAsRead(KontakPesan $kontakPesan)
    {
        $kontakPesan->update(['is_read' => true]);

        return redirect()->route('admin.kontak.index')
            ->with('success', 'Pesan berhasil ditandai sebagai dibaca.');
    }

    public function markAsUnread(KontakPesan $kontakPesan)
    {
        $kontakPesan->update(['is_read' => false]);

        return redirect()->route('admin.kontak.index')
            ->with('success', 'Pesan berhasil ditandai sebagai belum dibaca.');
    }

    public function destroy(KontakPesan $kontakPesan)
    {
        $kontakPesan->delete();

        return redirect()->route('admin.kontak.index')
            ->with('success', 'Pesan berhasil dihapus.');
    }
}
