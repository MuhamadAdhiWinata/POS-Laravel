<x-app-layout title="Barang">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Barang</title>
</head>
<body>

    <h2>Data Barang</h2>

    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('barang.form_input') }}">Tambah Barang</a>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach($data as $barang)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $barang->nama_barang }}</td>
                    <td>{{ $barang->kategori->nama_kategori ?? '-' }}</td>
                    <td>{{ number_format($barang->harga, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('barang.edit', $barang->barang_id) }}">Edit</a> |
                        <a href="{{ route('barang.delete', $barang->barang_id) }}"
                        onclick="return confirm('Yakin ingin menghapus barang ini?')">Hapus</a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>

</x-app-layout>

