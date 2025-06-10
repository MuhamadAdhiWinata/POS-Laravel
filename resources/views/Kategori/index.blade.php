{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Kategori</title>
</head>
<body> --}}

<x-app-layout title="Kategori">
    <h2>Daftar Kategori</h2>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p style="color:red">{{ session('error') }}</p>
    @endif

    <a href="{{ route('kategori.form_input') }}">Tambah Kategori</a>

    <table border="1" cellpadding="8" cellspacing="0" style="margin-top: 10px;">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $index => $kategori)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $kategori->nama_kategori }}</td>
                    <td>
                        <a href="{{ route('kategori.edit', encrypt($kategori->kategori_id)) }}">Edit</a> |
                        <a href="{{ route('kategori.delete', encrypt($kategori->kategori_id)) }}" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Belum ada data.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</x-app-layout>
{{-- </body>
</html> --}}
