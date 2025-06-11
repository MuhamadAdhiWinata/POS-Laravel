<x-app-layout title="Form Tambah Barang">
    <x-slot name="heading">
        Form Tambah Barang
    </x-slot>

    <x-form.form-container action="{{ route('barang.post') }}" method="POST">
        <x-form.form-input
            name="nama_barang"
            label="Nama Barang"
            type="text"
            placeholder="Masukkan nama barang"
            required />

        <x-form.form-input name="kategori_id" label="Kategori" type="select" required>
            <option value="">-- Pilih Kategori --</option>
            @foreach($kategori as $kat)
                <option value="{{ $kat->kategori_id }}" {{ old('kategori_id') == $kat->kategori_id ? 'selected' : '' }}>
                    {{ $kat->nama_kategori }}
                </option>
            @endforeach
        </x-form.form-input>

        <x-form.form-input
            name="harga"
            label="Harga"
            type="number"
            placeholder="0"
            required />

        <x-slot name="buttons">
            <a href="{{ route('barang.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Kembali
            </a>
            <x-form.form-button type="submit">
                Simpan Barang
            </x-form.form-button>
        </x-slot>
    </x-form.form-container>
</x-app-layout>
