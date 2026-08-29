@extends('app')

@section('title', 'Tambah Barang')

@section('content')
<h2>Tambah Barang</h2>
<form action="/barang" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nama Barang</label>
        <input type="text" name="nama_barang" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Stok</label>
        <input type="number" name="stok" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="harga" class="form-control" step="0.01" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="/barang" class="btn btn-secondary">Batal</a>
</form>
@endsection