<x-app-layout title="Operator">
    <!DOCTYPE html>
<html>
<head>
    <title>Data Operator</title>
</head>
<body>
    <h2>Data Operator</h2>

    <a href="{{ route('operator.form_input') }}">Tambah Operator</a>
    <br><br>

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Username</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $i => $item)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $item->nama_lengkap }}</td>
                <td>{{ $item->username }}</td>
                <td>
                    <a href="{{ route('operator.edit', Crypt::encrypt($item->operator_id)) }}">Edit</a> |
                    <a href="{{ route('operator.delete', Crypt::encrypt($item->operator_id)) }}" onclick="return confirm('Hapus operator ini?')">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

</x-app-layout>

