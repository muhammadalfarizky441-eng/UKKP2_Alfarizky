@extends('app')

@section('title', 'Edit Barang')

@section('content')
<h2>Edit Barang</h2>
<form action="/barang/{{ $barang->id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Nama Barang</label>
        <input type="text" name="nama_barang" class="form-control" value="{{ $barang->nama_barang }}" required>
    </div>
    <div class="mb-3">
        <label>Stok</label>
        <input type="number" name="stok" class="form-control" value="{{ $barang->stok }}" required>
    </div>
    <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="harga" class="form-control" step="0.01" value="{{ $barang->harga }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="/barang" class="btn btn-secondary">Batal</a>
</form>
@endsection