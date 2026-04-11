<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminGuruController extends Controller
{
    /**
     * Display a listing of the guru.
     */
    public function index(Request $request)
    {
        $query = Guru::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('nip', 'like', "%{$search}%")
                  ->orWhere('mata_pelajaran', 'like', "%{$search}%");
            });
        }

        if ($request->filled('jenis_kelamin')) {
            $query->where('jenis_kelamin', $request->jenis_kelamin);
        }

        $guru = $query->latest()->paginate(10)->withQueryString();

        return view('admin.guru.index', compact('guru'));
    }

    /**
     * Show the form for creating a new guru.
     */
    public function create()
    {
        return view('admin.guru.create');
    }

    /**
     * Store a newly created guru in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'nullable|string|max:50',
            'jenis_kelamin' => 'required|in:L,P',
            'mata_pelajaran' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('guru', 'public');
        }

        Guru::create($validated);

        return redirect()->route('admin.guru.index')
            ->with('success', 'Data guru berhasil ditambahkan.');
    }

    /**
     * Display the specified guru.
     */
    public function show(Guru $guru)
    {
        return view('admin.guru.show', compact('guru'));
    }

    /**
     * Show the form for editing the specified guru.
     */
    public function edit(Guru $guru)
    {
        return view('admin.guru.edit', compact('guru'));
    }

    /**
     * Update the specified guru in storage.
     */
    public function update(Request $request, Guru $guru)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'nullable|string|max:50',
            'jenis_kelamin' => 'required|in:L,P',
            'mata_pelajaran' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            // Delete old photo if exists
            if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
                Storage::disk('public')->delete($guru->foto);
            }

            $validated['foto'] = $request->file('foto')->store('guru', 'public');
        }

        $guru->update($validated);

        return redirect()->route('admin.guru.index')
            ->with('success', 'Data guru berhasil diperbarui.');
    }

    /**
     * Remove the specified guru from storage.
     */
    public function destroy(Guru $guru)
    {
        // Delete photo if exists
        if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
            Storage::disk('public')->delete($guru->foto);
        }

        $guru->delete();

        return redirect()->route('admin.guru.index')
            ->with('success', 'Data guru berhasil dihapus.');
    }
}
