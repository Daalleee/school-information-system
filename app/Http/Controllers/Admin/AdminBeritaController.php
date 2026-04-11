<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\KategoriBerita;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminBeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::with(['user', 'kategori'])->latest();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('isi', 'like', "%{$search}%");
            });
        }

        if ($request->filled('kategori')) {
            $query->where('kategori_id', $request->kategori);
        }

        $beritas = $query->paginate(10)->withQueryString();
        $kategoris = KategoriBerita::all();

        return view('admin.berita.index', compact('beritas', 'kategoris'));
    }

    public function create()
    {
        $kategoris = KategoriBerita::all();
        $users = User::all();

        return view('admin.berita.create', compact('kategoris', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:berita,slug',
            'isi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'user_id' => 'required|exists:user,id',
            'kategori_id' => 'nullable|exists:kategori_berita,id',
        ]);

        $validated['slug'] = $validated['slug'] ?: Str::slug($validated['judul']);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('berita', 'public');
        }

        Berita::create($validated);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit(Berita $berita)
    {
        $kategoris = KategoriBerita::all();
        $users = User::all();

        return view('admin.berita.edit', compact('berita', 'kategoris', 'users'));
    }

    public function update(Request $request, Berita $berita)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'slug' => 'required|string|unique:berita,slug,' . $berita->id,
            'isi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'user_id' => 'required|exists:user,id',
            'kategori_id' => 'nullable|exists:kategori_berita,id',
        ]);

        if ($request->hasFile('foto')) {
            if ($berita->foto) {
                Storage::disk('public')->delete($berita->foto);
            }
            $validated['foto'] = $request->file('foto')->store('berita', 'public');
        }

        $berita->update($validated);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $berita)
    {
        if ($berita->foto) {
            Storage::disk('public')->delete($berita->foto);
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }

    public function generateSlug(Request $request)
    {
        $slug = Str::slug($request->judul);

        $originalSlug = $slug;
        $counter = 1;

        while (Berita::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return response()->json(['slug' => $slug]);
    }
}
