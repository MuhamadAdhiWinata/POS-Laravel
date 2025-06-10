<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Tambah Barang</title>
</head>
<body>

    <h2>Form Tambah Barang</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('barang.post') }}" method="POST">
        @csrf

        <label for="nama_barang">Nama Barang:</label><br>
        <input type="text" name="nama_barang" id="nama_barang" required><br><br>

        <label for="kategori_id">Kategori:</label><br>
        <select name="kategori_id" id="kategori_id" required>
            <option value="">-- Pilih Kategori --</option>
            @foreach($kategori as $kat)
                <option value="{{ $kat->kategori_id }}">{{ $kat->nama_kategori }}</option>
            @endforeach
        </select><br><br>

        <label for="harga">Harga:</label><br>
        <input type="number" name="harga" id="harga" required><br><br>

        <button type="submit">Simpan</button>
    </form>

    <br>
    <a href="{{ route('barang.index') }}">Kembali ke Daftar Barang</a>

</body>
</html>
