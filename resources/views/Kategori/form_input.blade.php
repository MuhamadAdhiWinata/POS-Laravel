<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Tambah Kategori</title>
</head>
<body>

    <h2>Form Tambah Kategori</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kategori.post') }}" method="POST">
        @csrf
        <label for="nama_kategori">Nama Kategori:</label><br>
        <input type="text" name="nama_kategori" id="nama_kategori" required><br><br>
        <button type="submit">Simpan</button>
    </form>

    <br>
    <a href="{{ route('kategori.index') }}">Kembali</a>

</body>
</html>
