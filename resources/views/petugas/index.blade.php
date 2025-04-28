<x-default-layout title="Petugas" section_title="Petugas">

    <!-- Tombol Tambah -->
    <div class="flex justify-end mb-4">
        <a href="{{ route('petugas.create') }}" class="bg-gradient-to-r from-green-400 to-green-600 hover:from-green-500 hover:to-green-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105">
            + Tambah Petugas
        </a>
    </div>

    <!-- List Petugas -->
    <div class="bg-white p-6 rounded-lg shadow">
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full table-auto border-collapse">
            <thead class="bg-zinc-200">
                <tr>
                    <th class="border px-4 py-2">#</th>
                    <th class="border px-4 py-2">Nama</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($petugas as $petuga)
                    <tr>
                        <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2">{{ $petuga->nama }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('petugas.edit', $petuga) }}" class="text-blue-500 hover:underline mr-2">Edit</a>

                            <form action="{{ route('petugas.destroy', $petuga) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus petugas ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center py-4">Belum ada petugas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</x-default-layout>
