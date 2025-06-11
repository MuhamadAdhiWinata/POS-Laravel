<x-app-layout title="Operator">
    <x-slot name="heading">
        Data Operator
    </x-slot>

    <div class="flex flex-col space-y-4">
        <div class="flex">
            <button
                onclick="window.location.href='{{ route('operator.form_input') }}'"
                type="button"
                class="text-white bg-gray-700 hover:bg-gray-800 p-2 mb-2 rounded text-sm font-sans font-semibold">
                Tambah Operator
            </button>
        </div>
            <!-- Isi tabel -->
        <table id="operatorTable" class="display" style="width:100%">
            <thead class="text-sm font-sans font-bold">
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Username</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="text-sm font-sans font-semibold">
                @foreach ($data as $i => $item)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $item->nama_lengkap }}</td>
                    <td>{{ $item->username }}</td>
                    <td class="text-xs text-center text-white font-medium space-x-2">
                        <a href="{{ route('operator.edit', Crypt::encrypt($item->operator_id)) }}"
                            class="bg-gray-600 hover:bg-gray-800 py-1 px-2 rounded">Edit</a>
                        <a href="{{ route('operator.delete', Crypt::encrypt($item->operator_id)) }}"
                            onclick="return confirm('Hapus operator ini?')"
                            class="bg-red-900 hover:bg-red-600 py-1 px-2 rounded">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <x-datatable tableId="operatorTable" init="true" />
</x-app-layout>
