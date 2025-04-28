<?php

namespace App\Http\Controllers;

use App\Models\Penanganan;
use App\Models\Laporan;
use App\Models\PetugasKebersihan;
use Illuminate\Http\Request;

class PenangananController extends Controller
{
    /**
     * Menampilkan semua data penanganan.
     */
    public function index()
    {
        $laporans = Laporan::with('petugas')->get();
        $penanganans = Penanganan::with(['laporan', 'petugas'])->get();
        return view('penanganan.index', compact('penanganans'));
    }

    /**
     * Menampilkan form buat penanganan baru.
     */
    public function create()
    {
        $laporans = Laporan::with('petugas')->get(); // Dengan relasi petugas
        return view('penanganan.create', compact('laporans'));
    }
    

    /**
     * Menyimpan penanganan baru.
     */
    public function store(Request $request)
{
    $request->validate([
        'laporan_id' => 'required|exists:laporans,id',
        'tanggal_penanganan' => 'nullable|date',
        'catatan' => 'nullable|string',
        'status' => 'required|in:Dalam Proses,Selesai,Butuh Bantuan',
    ]);

    // Cari laporan terkait
    $laporan = Laporan::findOrFail($request->laporan_id);

    // Buat Penanganan
    Penanganan::create([
        'laporan_id' => $laporan->id,
        'petugas_id' => $laporan->petugas_id, // Ambil petugas dari laporan
        'tanggal_penanganan' => $request->tanggal_penanganan,
        'catatan' => $request->catatan,
        'status' => $request->status,
    ]);

    return redirect()->route('penanganan.index')->with('success', 'Penanganan berhasil ditambahkan.');
}

    /**
     * Menampilkan detail penanganan.
     */
    public function show(Penanganan $penanganan)
    {
        return view('penanganan.show', compact('penanganan'));
    }

    /**
     * Menampilkan form edit penanganan.
     */
    public function edit(Penanganan $penanganan)
{
    $laporans = Laporan::with('petugas')->get();
    return view('penanganan.edit', compact('penanganan', 'laporans'));
}


    /**
     * Update data penanganan.
     */
    public function update(Request $request, Penanganan $penanganan)
    {
        $request->validate([
            'laporan_id' => 'required|exists:laporans,id',
            'tanggal_penanganan' => 'nullable|date',
            'catatan' => 'nullable|string',
            'status' => 'required|in:Dalam Proses,Selesai,Butuh Bantuan',
        ]);
    
        $laporan = Laporan::findOrFail($request->laporan_id);
    
        $penanganan->update([
            'laporan_id' => $laporan->id,
            'petugas_id' => $laporan->petugas_id,
            'tanggal_penanganan' => $request->tanggal_penanganan,
            'catatan' => $request->catatan,
            'status' => $request->status,
        ]);
    
        return redirect()->route('penanganan.index')->with('success', 'Penanganan berhasil diupdate.');
    }
    

    /**
     * Menghapus data penanganan.
     */
    public function destroy(Penanganan $penanganan)
    {
        $penanganan->delete();
        return redirect()->route('penanganan.index')->with('success', 'Penanganan berhasil dihapus.');
    }
}
