@extends('app')

@section('title', 'Data Barang')

@section('content')
<h2>Data Barang</h2>
<a href="/barang/create" class="btn btn-primary mb-3">Tambah Barang</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($barangs as $i => $barang)
        <tr>
            <td>{{ $i+1 }}</td>
            <td>{{ $barang->nama_barang }}</td>
            <td>{{ $barang->stok }}</td>
            <td>Rp {{ number_format($barang->harga, 0, ',', '.') }}</td>
            <td>
                <a href="/barang/{{ $barang->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                <form action="/barang/{{ $barang->id }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection