<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ppdb;
use Illuminate\Http\Request;

class AdminPpdbController extends Controller
{
    public function index(Request $request)
    {
        $query = Ppdb::query();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_lengkap', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('no_hp', 'like', "%{$search}%")
                  ->orWhere('asal_sekolah', 'like', "%{$search}%");
            });
        }

        $pendaftars = $query->latest()->paginate(15)->withQueryString();

        return view('admin.ppdb.index', compact('pendaftars'));
    }

    public function show(Ppdb $ppdb)
    {
        return view('admin.ppdb.show', compact('ppdb'));
    }

    public function updateStatus(Request $request, Ppdb $ppdb)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,diterima,ditolak',
        ]);

        $ppdb->update($validated);

        return redirect()->route('admin.ppdb.show', $ppdb)
            ->with('success', 'Status pendaftar berhasil diperbarui.');
    }

    public function destroy(Ppdb $ppdb)
    {
        $ppdb->delete();

        return redirect()->route('admin.ppdb.index')
            ->with('success', 'Pendaftar berhasil dihapus.');
    }
}
