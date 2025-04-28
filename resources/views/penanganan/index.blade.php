<x-default-layout title="Penanganan" section_title="Penanganan">

    <!-- Tombol Tambah Penanganan -->
    <div class="flex justify-end mb-4">
    <a href="{{ route('penanganan.create') }}"
       class="bg-gradient-to-r from-blue-400 to-blue-600 hover:from-blue-500 hover:to-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105">
        + Tambah Penanganan
    </a>
    </div>

    <!-- Tabel Daftar Penanganan -->
    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-2xl font-bold mb-4">Daftar Penanganan</h2>

        <div class="overflow-x-auto">
            <table class="w-full table-auto border-collapse">
                <thead class="bg-zinc-200">
                    <tr>
                        <th class="border px-4 py-2">#</th>
                        <th class="border px-4 py-2">Nama Pelapor</th>
                        <th class="border px-4 py-2">Petugas</th>
                        <th class="border px-4 py-2">Tanggal Penanganan</th>
                        <th class="border px-4 py-2">Status</th>
                        <th class="border px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($penanganans as $penanganan)
                        <tr>
                            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2">{{ $penanganan->laporan->nama ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $penanganan->petugas->nama ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $penanganan->tanggal_penanganan ? \Carbon\Carbon::parse($penanganan->tanggal_penanganan)->format('d-m-Y') : '-' }}</td>
                            <td class="border px-4 py-2">{{ $penanganan->status }}</td>
                            <td class="border px-4 py-2 whitespace-nowrap">
                            <div class="flex space-x-2 justify-center">
                                <a href="{{ route('penanganan.edit', $penanganan) }}"
                                class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded transition duration-200"
                                       title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                        </svg>
                                    </a>
                                <form action="{{ route('penanganan.destroy', $penanganan->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="bg-red-500 hover:bg-red-600 text-white p-2 rounded transition duration-200"
                                                title="Hapus"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus laporan ini?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </form>
</div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">Belum ada data penanganan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</x-default-layout>
