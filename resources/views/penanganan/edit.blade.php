<x-default-layout title="Edit Penanganan" section_title="Edit Penanganan">

    <div class="bg-white p-6 rounded-lg shadow">
        <form action="{{ route('penanganan.update', $penanganan) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Laporan</label>
                <select name="laporan_id" class="w-full border rounded px-3 py-2">
                    @foreach($laporans as $laporan)
                        <option value="{{ $laporan->id }}" {{ $penanganan->laporan_id == $laporan->id ? 'selected' : '' }}>
                            {{ $laporan->nama }} ({{ $laporan->nim }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Tanggal Penanganan</label>
                <input type="date" name="tanggal_penanganan" class="w-full border rounded px-3 py-2" value="{{ $penanganan->tanggal_penanganan }}">
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Catatan</label>
                <textarea name="catatan" rows="3" class="w-full border rounded px-3 py-2">{{ $penanganan->catatan }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Status</label>
                <select name="status" class="w-full border rounded px-3 py-2">
                    <option value="Dalam Proses" {{ $penanganan->status == 'Dalam Proses' ? 'selected' : '' }}>Dalam Proses</option>
                    <option value="Selesai" {{ $penanganan->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    <option value="Butuh Bantuan" {{ $penanganan->status == 'Butuh Bantuan' ? 'selected' : '' }}>Butuh Bantuan</option>
                </select>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="bg-gradient-to-r from-blue-400 to-blue-600 hover:from-blue-500 hover:to-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105">
                    Update
                </button>
            </div>
        </form>
    </div>

</x-default-layout>
