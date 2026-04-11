<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProfilController extends Controller
{
    public function index()
    {
        $profil = ProfilSekolah::first();

        return view('admin.profil.index', compact('profil'));
    }

    public function update(Request $request)
    {
        $profil = ProfilSekolah::first();

        if (!$profil) {
            return redirect()->route('admin.profil.index')
                ->with('error', 'Data profil sekolah tidak ditemukan.');
        }

        $validated = $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'deskripsi' => 'required|string',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            if ($profil->logo && Storage::disk('public')->exists('images/sekolah/' . $profil->logo)) {
                Storage::disk('public')->delete('images/sekolah/' . $profil->logo);
            }

            $file = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('images/sekolah', $filename, 'public');

            $validated['logo'] = $filename;
        }

        $profil->update($validated);

        return redirect()->route('admin.profil.index')
            ->with('success', 'Profil sekolah berhasil diperbarui.');
    }
}
