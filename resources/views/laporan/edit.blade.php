<x-default-layout title="Edit Laporan" section_title="Edit Laporan">

    <div class="bg-white p-6 rounded-lg shadow mb-8">
        <h2 class="text-2xl font-bold mb-4">Edit Laporan</h2>

        <form action="{{ route('laporan.update', $laporan->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block mb-1 font-semibold">Nama</label>
                <input type="text" name="nama" value="{{ old('nama', $laporan->nama) }}" 
                       class="w-full border rounded p-2 @error('nama') border-red-500 @enderror" required>
                @error('nama')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block mb-1 font-semibold">NIM</label>
                <input type="text" name="nim" value="{{ old('nim', $laporan->nim) }}" 
                       class="w-full border rounded p-2 @error('nim') border-red-500 @enderror" required>
                @error('nim')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block mb-1 font-semibold">Foto</label>
                @if($laporan->foto)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $laporan->foto) }}" alt="Foto saat ini" class="h-32">
                        <p class="text-sm text-gray-500 mt-1">Foto saat ini</p>
                    </div>
                @endif
                <input type="file" name="foto" class="w-full border rounded p-2 @error('foto') border-red-500 @enderror">
                @error('foto')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block mb-1 font-semibold">Keterangan</label>
                <textarea name="keterangan" class="w-full border rounded p-2 @error('keterangan') border-red-500 @enderror" 
                          rows="4">{{ old('keterangan', $laporan->keterangan) }}</textarea>
                @error('keterangan')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block mb-1 font-semibold">Petugas Kebersihan</label>
                <select name="petugas_id" class="w-full border rounded p-2 @error('petugas_id') border-red-500 @enderror" required>
                    <option value="">-- Pilih Petugas --</option>
                    @foreach($petugas as $p)
                        <option value="{{ $p->id }}" {{ old('petugas_id', $laporan->petugas_id) == $p->id ? 'selected' : '' }}>
                            {{ $p->nama }}
                        </option>
                    @endforeach
                </select>
                @error('petugas_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center space-x-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Simpan Perubahan
                </button>
                <a href="{{ route('laporan.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                    Batal
                </a>
            </div>
        </form>
    </div>

</x-default-layout>