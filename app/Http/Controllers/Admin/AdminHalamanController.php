<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Halaman;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminHalamanController extends Controller
{
    public function index(Request $request)
    {
        $query = Halaman::latest();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('konten', 'like', "%{$search}%");
            });
        }

        $halamans = $query->paginate(10)->withQueryString();

        return view('admin.halaman.index', compact('halamans'));
    }

    public function create()
    {
        return view('admin.halaman.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:halaman,slug',
            'konten' => 'required|string',
        ]);

        $validated['slug'] = $validated['slug'] ?: Str::slug($validated['judul']);

        Halaman::create($validated);

        return redirect()->route('admin.halaman.index')
            ->with('success', 'Halaman berhasil ditambahkan.');
    }

    public function edit(Halaman $halaman)
    {
        return view('admin.halaman.edit', compact('halaman'));
    }

    public function update(Request $request, Halaman $halaman)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'slug' => 'required|string|unique:halaman,slug,' . $halaman->id,
            'konten' => 'required|string',
        ]);

        $halaman->update($validated);

        return redirect()->route('admin.halaman.index')
            ->with('success', 'Halaman berhasil diperbarui.');
    }

    public function destroy(Halaman $halaman)
    {
        $halaman->delete();

        return redirect()->route('admin.halaman.index')
            ->with('success', 'Halaman berhasil dihapus.');
    }

    public function generateSlug(Request $request)
    {
        $slug = Str::slug($request->judul);

        $originalSlug = $slug;
        $counter = 1;

        while (Halaman::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return response()->json(['slug' => $slug]);
    }
}
