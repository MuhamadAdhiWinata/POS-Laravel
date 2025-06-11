<x-app-layout title="Form Input Kategori">
    <x-slot name="heading">
        Form Input Kategori
    </x-slot>

    <x-form.form-container action="{{ route('kategori.post') }}" method="POST">
        <x-form.form-input
            name="nama_kategori"
            label="Nama Kategori"
            type="text"
            placeholder="Masukkan Nama Kategori"
            required/>
        <x-slot name="buttons">
            <a href="{{ route('kategori.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Kembali
            </a>
            <x-form.form-button type="submit">
                Simpan Barang
            </x-form.form-button>
        </x-slot>
    </x-form.form-container>

</x-app-layout>
