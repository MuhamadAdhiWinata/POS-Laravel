<x-app-layout title="Edit Kategori">
    <x-slot name="heading">
        Edit Kategori
    </x-slot>

    <x-form.form-container action="{{ route('kategori.update', $kategori->kategori_id) }}" method="POST">
        @method('POST')

        <!-- Input Nama Kategori -->
        <x-form.form-input
            name="nama_kategori"
            label="Nama Kategori"
            type="text"
            value="{{ old('nama_kategori', $kategori->nama_kategori) }}"
            placeholder="Masukkan nama kategori"
            required
        />

        <!-- Action Buttons -->
        <x-slot name="buttons">
            <a href="{{ route('kategori.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Kembali
            </a>
            <x-form.form-button type="submit">
                Update Kategori
            </x-form.form-button>
        </x-slot>
    </x-form-container>
</x-app-layout>
