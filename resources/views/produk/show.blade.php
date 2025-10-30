<!DOCTYPE html>
<html>
<head>
  <title>Detail Produk</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="p-6">
  <h1 class="text-xl font-bold mb-4">Detail Produk</h1>

  <p><strong>Nama:</strong> {{ $produk->nama_produk }}</p>
  <p><strong>Harga:</strong> {{ $produk->harga }}</p>
  <p><strong>Stok:</strong> {{ $produk->stok }}</p>
  <p><strong>Deskripsi:</strong> {{ $produk->deskripsi ?? '-' }}</p>

  <a href="{{ route('produk.index') }}" class="text-gray-600 mt-4 block">Kembali</a>
</body>
</html>
