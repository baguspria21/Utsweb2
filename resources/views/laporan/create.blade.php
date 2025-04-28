<x-default-layout title="Tambah Laporan" section_title="Tambah Laporan">

    <div class="bg-white p-6 rounded-lg shadow mb-8">
        <h2 class="text-2xl font-bold mb-4">Tambah Laporan</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf

    <div>
        <label class="block mb-1 font-semibold">Nama</label>
        <input type="text" name="nama" class="w-full border rounded p-2 @error('nama') border-red-500 @enderror" 
               value="{{ old('nama') }}" required>
        @error('nama')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label class="block mb-1 font-semibold">NIM</label>
        <input type="text" name="nim" class="w-full border rounded p-2 @error('nim') border-red-500 @enderror" 
               value="{{ old('nim') }}" required placeholder="Contoh: F55123001">
        @error('nim')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label class="block mb-1 font-semibold">Foto</label>
        <input type="file" name="foto" class="w-full border rounded p-2 @error('foto') border-red-500 @enderror">
        @error('foto')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label class="block mb-1 font-semibold">Keterangan</label>
        <textarea name="keterangan" class="w-full border rounded p-2 @error('keterangan') border-red-500 @enderror" 
                  rows="4">{{ old('keterangan') }}</textarea>
        @error('keterangan')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label class="block mb-1 font-semibold">Petugas Kebersihan</label>
        <select name="petugas_id" class="w-full border rounded p-2 @error('petugas_id') border-red-500 @enderror" required>
            <option value="">-- Pilih Petugas --</option>
            @foreach($petugas as $p)
                <option value="{{ $p->id }}" {{ old('petugas_id') == $p->id ? 'selected' : '' }}>
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
                    Kirim Laporan
                </button>
                <a href="{{ route('laporan.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                    Kembali
                </a>
            </div>

    <!-- Tombol submit tetap sama -->
</form>
    </div>

</x-default-layout>
