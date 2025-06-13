<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Form Transaksi
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('transaksi.store') }}" method="POST" class="mb-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <input list="barang" name="barang" placeholder="Masukkan nama barang"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200">
                        <datalist id="barang">
                            @foreach ($barang as $b)
                                <option value="{{ $b->nama_barang }}"></option>
                            @endforeach
                        </datalist>
                    </div>

                    <div>
                        <input type="number" name="qty" placeholder="QTY"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200" required>
                    </div>

                    <div class="flex space-x-2">
                        <button type="submit"
                            class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Simpan</button>

                        <a href="{{ route('transaksi.selesai') }}"
                            class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Selesai</a>
                    </div>
                </div>
            </form>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4">
                    <h3 class="font-semibold mb-4 text-lg">Detail Transaksi</h3>
                    <table class="min-w-full table-auto border border-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border px-4 py-2">No</th>
                                <th class="border px-4 py-2">Nama Barang</th>
                                <th class="border px-4 py-2">Qty</th>
                                <th class="border px-4 py-2">Harga</th>
                                <th class="border px-4 py-2">Subtotal</th>
                                <th class="border px-4 py-2">Cancel</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; $total = 0; @endphp
                            @foreach ($detail as $r)
                                <tr>
                                    <td class="border px-4 py-2">{{ $no++ }}</td>
                                    <td class="border px-4 py-2">{{ $r->nama_barang }}</td>
                                    <td class="border px-4 py-2">{{ $r->qty }}</td>
                                    <td class="border px-4 py-2">{{ number_format($r->harga) }}</td>
                                    <td class="border px-4 py-2">{{ number_format($r->qty * $r->harga) }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('transaksi.destroy', $r->t_detail_id) }}"
                                            class="text-red-600 hover:underline">Hapus</a>
                                    </td>
                                </tr>
                                @php $total += ($r->qty * $r->harga); @endphp
                            @endforeach
                            <tr class="bg-gray-100 font-semibold">
                                <td colspan="4" class="border px-4 py-2 text-right">Total</td>
                                <td class="border px-4 py-2">{{ number_format($total) }}</td>
                                <td class="border px-4 py-2"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
