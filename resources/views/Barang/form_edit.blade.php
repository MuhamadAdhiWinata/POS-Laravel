<x-app-layout title="Form Edit Barang">
    <x-slot name="heading">
        Form Edit Barang
    </x-slot>

    <x-form.form-container action="{{ route('barang.update', $barang->barang_id) }}" method="POST">
        @method('POST')

        <!-- Input Nama Barang -->
        <x-form.form-input
            name="nama_barang"
            label="Nama Barang"
            type="text"
            value="{{ old('nama_barang', $barang->nama_barang) }}"
            required
        />

        <!-- Select Kategori -->
        <x-form.form-input name="kategori_id" label="Kategori" type="select" required>
            @foreach($kategori as $kat)
                <option value="{{ $kat->kategori_id }}"
                    {{ (old('kategori_id', $barang->kategori_id) == $kat->kategori_id) ? 'selected' : '' }}>
                    {{ $kat->nama_kategori }}
                </option>
            @endforeach
        </x-form.form-input>

        <!-- Input Harga -->
        <x-form.form-input
            name="harga"
            label="Harga (Rp)"
            type="number"
            value="{{ old('harga', $barang->harga) }}"
            required
        />

        <!-- Action Buttons -->
        <x-slot name="buttons">
            <a href="{{ route('barang.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Kembali
            </a>
            <x-form.form-button type="submit">
                Update Barang
            </x-form.form-button>
        </x-slot>
    </x-form.form-container>
</x-app-layout>
