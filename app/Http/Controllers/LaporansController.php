<?php

namespace App\Http\Controllers;

use App\Models\Laporan; // <-- Ini singular
use App\Models\PetugasKebersihan;
use Illuminate\Http\Request;

class LaporansController extends Controller
{
    public function index()
    {
        $laporans = Laporan::with('penanganan')->get();
        $laporans = Laporan::with('petugas')->latest()->get(); // <-- Ini singular
        $petugas = PetugasKebersihan::all();
        return view('laporan.index', compact('laporans', 'petugas'));
    }

    public function create()
    {
        $petugas = PetugasKebersihan::all();
        return view('laporan.create', compact('petugas'));
    }

    public function store(Request $request)
    {
        // Rules validasi
        $rules = [
            'nama' => 'required|string|max:255',
            'nim' => [
                'required',
                'string',
                'max:255',
            ],
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'keterangan' => 'nullable|string|min:10,max:1000',
            'petugas_id' => 'required|exists:petugas_kebersihans,id',
        ];

        // Pesan validasi kustom
        $messages = [
            'nama.required' => 'Nama wajib diisi',
            'nama.max' => 'Nama maksimal 255 karakter',
            
            'nim.required' => 'NIM wajib diisi',
            
            'foto.image' => 'File harus berupa gambar',
            'foto.mimes' => 'Format gambar yang diterima: jpg, jpeg, png',
            'foto.max' => 'Ukuran gambar maksimal 2MB',
            
            'keterangan.max' => 'Keterangan maksimal 1000 karakter',
            'keterangan.min' => 'Keterangan minimal 10 karakter',
            
            'petugas_id.required' => 'Pilih petugas kebersihan',
            'petugas_id.exists' => 'Petugas yang dipilih tidak valid',
        ];

        // Validasi request
        $validatedData = $request->validate($rules, $messages);

        // Handle upload foto
        if ($request->hasFile('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('fotos', 'public');
        }

        // Simpan data
        Laporan::create($validatedData);

        return redirect()->route('laporan.index')
            ->with('success', 'Laporan berhasil dikirim!');
    }
    // LaporansController.php

public function edit($id)
{
    $laporan = Laporan::findOrFail($id);
    $petugas = PetugasKebersihan::all();
    return view('laporan.edit', compact('laporan', 'petugas'));
}

public function update(Request $request, $id)
{
    $laporan = Laporan::findOrFail($id);
    
    $rules = [
        'nama' => 'required|string|max:255',
        'nim' => [
            'required',
            'string',
            'max:255',
            'regex:/^F(55123|52123)\d{3}$/'
        ],
        'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'keterangan' => 'nullable|string|max:1000',
        'petugas_id' => 'required|exists:petugas_kebersihans,id',
    ];

    $validatedData = $request->validate($rules);

    // Handle foto update
    if ($request->hasFile('foto')) {
        // Hapus foto lama jika ada
        if ($laporan->foto) {
            Storage::delete('public/' . $laporan->foto);
        }
        $validatedData['foto'] = $request->file('foto')->store('fotos', 'public');
    }

    $laporan->update($validatedData);

    return redirect()->route('laporan.index')
        ->with('success', 'Laporan berhasil diperbarui');
}

public function destroy($id)
{
    $laporan = Laporan::findOrFail($id);
    
    // Hapus foto jika ada
    if ($laporan->foto) {
        Storage::delete('public/' . $laporan->foto);
    }
    
    $laporan->delete();

    return redirect()->route('laporan.index')
        ->with('success', 'Laporan berhasil dihapus');
}
}
