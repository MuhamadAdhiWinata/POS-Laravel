<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Laporan Transaksi
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('transaksi.laporan.proses') }}" method="POST" class="mb-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Mulai</label>
                                <input type="date" name="tanggal1" value="{{ $tanggal1 }}"
                                    class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Selesai</label>
                                <input type="date" name="tanggal2" value="{{ $tanggal2 }}"
                                    class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200" required>
                            </div>
                            <div class="flex items-end">
                                <button type="submit"
                                    class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                                    Proses
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto border border-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="border px-4 py-2">No</th>
                                    <th class="border px-4 py-2">Tanggal Transaksi</th>
                                    <th class="border px-4 py-2">Operator</th>
                                    <th class="border px-4 py-2">Total Transaksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($record as $r)
                                <tr>
                                    <td class="border px-4 py-2">{{ $no++ }}</td>
                                    <td class="border px-4 py-2">{{ $r->tanggal_transaksi }}</td>
                                    <td class="border px-4 py-2">{{ $r->nama_lengkap }}</td>
                                    <td class="border px-4 py-2 text-right">{{ number_format($r->total, 0, ',', '.') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="bg-gray-100 font-semibold">
                                <tr>
                                    <td colspan="3" class="border px-4 py-2 text-right">Total Keseluruhan</td>
                                    <td class="border px-4 py-2 text-right">{{ number_format($total, 0, ',', '.') }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
