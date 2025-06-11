<x-app-layout title="Kategori">
    <x-slot name="heading">
        Daftar Kategori
    </x-slot>

    <div class="flex flex-col space-y-4">
        <div class="flex">
            <button
                onclick="window.location.href='{{ route('kategori.form_input') }}'"
                type="button"
                class="text-white bg-gray-700 hover:bg-gray-800 p-2 mb-2 rounded text-sm font-sans font-semibold">
                Tambah Kategori
            </button>
        </div>

        <table id="kategoriTable" class="display" style="width:100%">
            <thead class="text-sm font-sans font-bold">
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="text-sm font-sans font-semibold">
                @php $no = 1 @endphp
                @foreach($data as $kategori)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $kategori->nama_kategori }}</td>
                        <td class="text-xs text-center text-white font-medium space-x-2">
                            <a href="{{ route('kategori.edit', encrypt($kategori->kategori_id)) }}"
                            class="bg-gray-600 hover:bg-gray-800 py-1 px-2 rounded">Edit</a>
                            <a href="{{ route('kategori.delete', encrypt($kategori->kategori_id)) }}"
                            onclick="return confirm('Yakin ingin hapus?')"
                            class="bg-red-900 hover:bg-red-600 py-1 px-2 rounded">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <x-datatable tableId="kategoriTable" init="true" />
</x-app-layout>
