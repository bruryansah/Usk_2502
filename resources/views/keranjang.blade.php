<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Keranjang Belanja</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Keranjang Belanja</h2>
        <a href="/">Kembali ke Home</a>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0; ?>
                @foreach($keranjang as $k)
                <?php $subtotal = $k->harga * $k->jumlah; $total += $subtotal; ?>
                <tr>
                    <td>{{$k->nama}}</td>
                    <td>Rp.{{$k->harga}}</td>
                    <td>{{$k->jumlah}}</td>
                    <td>Rp.{{$subtotal}}</td>
                    <td>
                        <a href="{{route('keranjang.hapus', $k->id)}}" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="3"><strong>Total</strong></td>
                    <td><strong>Rp.{{$total}}</strong></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
