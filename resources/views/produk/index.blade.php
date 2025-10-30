<!DOCTYPE html>
<html>
<head>
  <title>Daftar Produk</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="p-6">
  <h1 class="text-xl font-bold mb-4">Daftar Produk</h1>

  <a href="{{ route('produk.create') }}" class="bg-blue-500 text-white px-3 py-1 rounded">Tambah Produk</a>

  @if(session('success'))
    <p class="text-green-600 mt-2">{{ session('success') }}</p>
  @endif

  <div class="mt-4 overflow-x-auto">
    <table class="min-w-full border border-gray-300 text-center">
      <thead>
        <tr class="bg-gray-200 border-b">
          <th class="py-2 px-4 border-r">Nama Produk</th>
          <th class="py-2 px-4 border-r">Harga</th>
          <th class="py-2 px-4 border-r">Stok</th>
          <th class="py-2 px-4 border-r">Deskripsi</th>
          <th class="py-2 px-4">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($produks as $p)
        <tr class="border-b hover:bg-gray-100">
          <td class="py-2 px-4 border-r">{{ $p->nama_produk }}</td>
          <td class="py-2 px-4 border-r">Rp{{ number_format($p->harga, 0, ',', '.') }}</td>
          <td class="py-2 px-4 border-r">{{ $p->stok }}</td>
          <td class="py-2 px-4 border-r">{{ $p->deskripsi ?? '-' }}</td>
          <td class="py-2 px-4">
            <div class="flex justify-center gap-2">
              <a href="{{ route('produk.show', $p) }}" class="text-blue-600">Lihat</a>
              <a href="{{ route('produk.edit', $p) }}" class="text-yellow-600">Edit</a>
              <form action="{{ route('produk.destroy', $p) }}" method="POST" onsubmit="return confirm('Hapus produk ini?')">
                @csrf
                @method('DELETE')
                <button class="text-red-600">Hapus</button>
              </form>
            </div>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="5" class="py-3 text-gray-500">Belum ada produk</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</body>
</html>
