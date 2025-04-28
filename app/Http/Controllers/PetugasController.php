<?php

namespace App\Http\Controllers;

use App\Models\PetugasKebersihan;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index()
    {
        $petugas = PetugasKebersihan::all();
        return view('petugas.index', compact('petugas'));
    }

    public function create()
    {
        return view('petugas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        PetugasKebersihan::create($request->only('nama'));

        return redirect()->route('petugas.index')->with('success', 'Petugas berhasil ditambahkan.');
    }

    public function edit(PetugasKebersihan $petuga)
    {
        return view('petugas.edit', compact('petuga'));
    }

    public function update(Request $request, PetugasKebersihan $petuga)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $petuga->update($request->only('nama'));

        return redirect()->route('petugas.index')->with('success', 'Petugas berhasil diperbarui.');
    }

    public function destroy(PetugasKebersihan $petuga)
    {
        $petuga->delete();

        return redirect()->route('petugas.index')->with('success', 'Petugas berhasil dihapus.');
    }
}
