<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Transaksi</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
    </style>
</head>
<body>
    <h3>Laporan Transaksi</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Operator</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach($record as $r)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $r->tanggal_transaksi }}</td>
                    <td>{{ $r->nama_lengkap }}</td>
                    <td>Rp{{ number_format($r->total) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
