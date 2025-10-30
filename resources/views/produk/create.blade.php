<!DOCTYPE html>
<html>
<head>
  <title>Tambah Produk</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="p-6">
  <h1 class="text-xl font-bold mb-4">Tambah Produk</h1>

  @if ($errors->any())
    <div class="text-red-600 mb-3">
      @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
      @endforeach
    </div>
  @endif

  <form action="{{ route('produk.store') }}" method="POST" class="space-y-3">
    @csrf
    <div>
      <label>Nama Produk</label>
      <input type="text" name="nama_produk" class="border p-2 w-full">
    </div>

    <div>
      <label>Harga</label>
      <input type="number" name="harga" class="border p-2 w-full">
    </div>

    <div>
      <label>Stok</label>
      <input type="number" name="stok" value="0" class="border p-2 w-full">
    </div>

    <div>
      <label>Deskripsi</label>
      <textarea name="deskripsi" class="border p-2 w-full"></textarea>
    </div>

    <button class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
  </form>
  <a href="{{ route('produk.index') }}" class="text-gray-600 mt-4 block">Kembali</a>
</body>
</html>
