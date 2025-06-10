<!DOCTYPE html>
<html>
<head>
    <title>Edit Operator</title>
</head>
<body>
    <h2>Edit Operator</h2>

    @if ($errors->any())
        <div style="color:red">
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('operator.update', $encryptedId) }}">
        @csrf
        <label>Nama Lengkap:</label><br>
        <input type="text" name="nama_lengkap" value="{{ $operator->nama_lengkap }}" required><br><br>

        <label>Username:</label><br>
        <input type="text" name="username" value="{{ $operator->username }}" required><br><br>

        <label>Password (biarkan kosong jika tidak diubah):</label><br>
        <input type="password" name="password"><br><br>

        <button type="submit">Update</button>
    </form>

    <br>
    <a href="{{ route('operator.index') }}">Kembali</a>
</body>
</html>
