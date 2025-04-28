<x-default-layout title="Tambah Petugas" section_title="Tambah Petugas">

    <div class="bg-white p-6 rounded-lg shadow">
        <form action="{{ route('petugas.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="nama" class="block mb-1 font-semibold">Nama Petugas</label>
                <input type="text" name="nama" id="nama" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="bg-gradient-to-r from-green-400 to-green-600 hover:from-green-500 hover:to-green-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105">
                    Simpan
                </button>
            </div>
        </form>
    </div>

</x-default-layout>
