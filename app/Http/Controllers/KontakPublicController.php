<?php

namespace App\Http\Controllers;

use App\Models\KontakPesan;
use Illuminate\Http\Request;

class KontakPublicController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'pesan' => 'required|string',
        ]);

        KontakPesan::create($validated);

        return redirect()->back()->with('success', 'Pesan Anda telah terkirim. Terima kasih!');
    }
}
