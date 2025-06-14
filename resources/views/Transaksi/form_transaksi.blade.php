<x-app-layout title="Checkout">
    <x-slot name="heading">
        Form Belanja
    </x-slot>

    <div class="py-2">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('transaksi.store') }}" method="POST" class="mb-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Input Nama Barang -->
                    <div>
                        <input list="barang" name="barang" placeholder="Masukkan nama barang"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-500 focus:border-gray-500 text-sm">
                        <datalist id="barang">
                            @foreach ($barang as $b)
                                <option value="{{ $b->nama_barang }}"></option>
                            @endforeach
                        </datalist>
                    </div>

                    <!-- Input Quantity -->
                    <div>
                        <input type="number" name="qty" placeholder="QTY" min="1" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-500 focus:border-gray-500 text-sm">
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex space-x-2">
                        <button type="submit"
                            class="px-4 py-2 bg-gray-700 text-white rounded-md text-sm font-sans font-semibold hover:bg-gray-800">
                            Simpan
                        </button>
                        <a href="{{ route('transaksi.selesai') }}"
                            class="px-4 py-2 bg-gray-700 text-white rounded-md text-sm font-sans font-semibold hover:bg-gray-800">
                            Selesai
                        </a>
                    </div>
                </div>
            </form>

            <!-- Tabel Detail Transaksi -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4">
                    <h3 class="font-semibold mb-4 text-sm font-sans">Detail Transaksi</h3>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr class="text-sm font-sans font-bold">
                                <th class="px-6 py-3 text-left">No</th>
                                <th class="px-6 py-3 text-left">Nama Barang</th>
                                <th class="px-6 py-3 text-left">Qty</th>
                                <th class="px-6 py-3 text-left">Harga</th>
                                <th class="px-6 py-3 text-left">Subtotal</th>
                                <th class="px-6 py-3 text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 text-sm font-sans font-semibold">
                            @php $no = 1; $total = 0; @endphp
                            @foreach ($detail as $r)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $no++ }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $r->nama_barang }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $r->qty }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Rp{{ number_format($r->harga) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Rp{{ number_format($r->qty * $r->harga) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-xs text-center space-x-2">
                                        <a href="{{ route('transaksi.destroy', $r->t_detail_id) }}"
                                            class="bg-red-900 hover:bg-red-600 py-1 px-2 rounded text-white"
                                            onclick="return confirm('Yakin ingin menghapus item ini?')">
                                            Hapus
                                        </a>
                                    </td>
                                </tr>
                                @php $total += ($r->qty * $r->harga); @endphp
                            @endforeach
                            <tr class="bg-gray-50 font-semibold">
                                <td colspan="4" class="px-6 py-4 text-right">Total</td>
                                <td class="px-6 py-4 whitespace-nowrap">Rp{{ number_format($total) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
