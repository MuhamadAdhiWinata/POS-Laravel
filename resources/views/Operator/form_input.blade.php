<!DOCTYPE html>
<html>
<head>
    <title>Form Tambah Operator</title>
</head>
<body>
    <h2>Form Tambah Operator</h2>

    @if ($errors->any())
        <div style="color:red">
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('operator.post') }}">
        @csrf
        <label>Nama Lengkap:</label><br>
        <input type="text" name="nama_lengkap" required><br><br>

        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Simpan</button>
    </form>

    <br>
    <a href="{{ route('operator.index') }}">Kembali</a>
</body>
</html>
