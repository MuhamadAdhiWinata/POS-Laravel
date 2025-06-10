<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'POS' }}</title>
</head>
<body>
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/barang">Barang</a></li>
        <li><a href="/kategori">Kategori</a></li>
        <li><a href="/operator">Operator</a></li>
    </ul>

    {{ $slot }}
</body>
</html>
