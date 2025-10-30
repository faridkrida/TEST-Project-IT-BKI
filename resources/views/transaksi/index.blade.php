<!DOCTYPE html>
<html>
<head>
  <title>Daftar Transaksi</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="p-6">
  <h1 class="text-xl font-bold mb-4">Daftar Transaksi</h1>

  <a href="{{ route('transaksi.create') }}" class="bg-blue-500 text-white px-3 py-1 rounded">Tambah Transaksi</a>

  @if(session('success'))
    <p class="text-green-600 mt-2">{{ session('success') }}</p>
  @endif

  <div class="mt-4 overflow-x-auto">
    <table class="min-w-full border border-gray-300 text-center">
      <thead>
        <tr class="bg-gray-200 border-b">
          <th class="py-2 px-4 border-r">Produk</th>
          <th class="py-2 px-4 border-r">Jumlah</th>
          <th class="py-2 px-4 border-r">Total Harga</th>
          <th class="py-2 px-4">Tanggal</th>
        </tr>
      </thead>
      <tbody>
        @forelse($transaksis as $t)
        <tr class="border-b hover:bg-gray-100">
          <td class="py-2 px-4 border-r">{{ $t->produk->nama_produk }}</td>
          <td class="py-2 px-4 border-r">{{ $t->jumlah }}</td>
          <td class="py-2 px-4 border-r">Rp{{ number_format($t->total_harga, 0, ',', '.') }}</td>
          <td class="py-2 px-4">{{ $t->tanggal_transaksi }}</td>
        </tr>
        @empty
        <tr>
          <td colspan="4" class="py-3 text-gray-500">Belum ada transaksi</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</body>
</html>
