<!DOCTYPE html>
<html>
<head>
  <title>Tambah Transaksi</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script>
    function hitungTotal() {
      const harga = document.querySelector('option:checked').dataset.harga || 0;
      const jumlah = document.getElementById('jumlah').value || 0;
      document.getElementById('total_harga').value = harga * jumlah;
    }
  </script>
</head>
<body class="p-6">
  <h1 class="text-xl font-bold mb-4">Tambah Transaksi</h1>

  @if ($errors->any())
    <div class="text-red-600 mb-3">
      @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
      @endforeach
    </div>
  @endif

  <form action="{{ route('transaksi.store') }}" method="POST" class="space-y-3">
    @csrf
    <div>
      <label>Produk</label>
      <select name="produk_id" id="produk_id" onchange="hitungTotal()" class="border p-2 w-full">
        <option value="">-- Pilih Produk --</option>
        @foreach($produks as $p)
          <option value="{{ $p->id }}" data-harga="{{ $p->harga }}">{{ $p->nama_produk }} (Rp{{ $p->harga }})</option>
        @endforeach
      </select>
    </div>

    <div>
      <label>Jumlah</label>
      <input type="number" name="jumlah" id="jumlah" oninput="hitungTotal()" class="border p-2 w-full">
    </div>

    <div>
      <label>Total Harga</label>
      <input type="number" id="total_harga" readonly class="border p-2 w-full bg-gray-100">
    </div>

    <div>
      <label>Tanggal Transaksi</label>
      <input type="date" name="tanggal_transaksi" class="border p-2 w-full">
    </div>

    <button class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
  </form>

  <a href="{{ route('transaksi.index') }}" class="text-gray-600 mt-4 block">Kembali</a>
</body>
</html>
