<x-app-layout title="Barang">
    <x-slot name="heading">
        Daftar Barang
    </x-slot>
    <div class="flex flex-col space-y-4">
        <div class="flex">
            <button
                onclick="window.location.href='{{ route('barang.form_input') }}'"
                type="button"
                class="text-white bg-gray-700 hover:bg-gray-800 p-2 mb-2 rounded text-sm font-sans font-semibold">
                Tambah Barang
            </button>
        </div>

        <table id="barangTable" class="display" style="width:100%">
            <thead class="text-sm font-sans font-bold">
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="text-sm font-sans font-semibold">
                @php $no = 1; @endphp
                @foreach($data as $barang)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $barang->nama_barang }}</td>
                        <td>{{ $barang->kategori->nama_kategori ?? '-' }}</td>
                        <td>{{ number_format($barang->harga, 0, ',', '.') }}</td>
                        <td class="text-xs text-center text-white font-medium space-x-2">
                            <a href="{{ route('barang.edit', $barang->barang_id) }}"
                            class="bg-gray-600 hover:bg-gray-800 py-1 px-2 rounded">Edit</a>
                            <a href="{{ route('barang.delete', $barang->barang_id) }}"
                            onclick="return confirm('Yakin ingin menghapus barang ini?')"
                            class="bg-red-900 hover:bg-red-600 py-1 px-2 rounded">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <x-datatable tableId="barangTable" init="true" />
</x-app-layout>
