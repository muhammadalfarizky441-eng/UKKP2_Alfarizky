@extends('app')

@section('title', 'Dashboard')

@section('content')
<h2>Selamat datang, {{ auth()->user()->name }} ({{ auth()->user()->role }})</h2>

@if(auth()->user()->role === 'admin')
    <p>Anda login sebagai <strong>Admin</strong> dan punya akses CRUD.</p>
    <div class="row mt-4">
        <div class="col-md-4 mb-3">
            <a href="/barang" class="btn btn-primary w-100 p-4">CRUD Barang</a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="/pelayanan" class="btn btn-success w-100 p-4">CRUD Pelayanan</a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="/makanan-minuman" class="btn btn-warning w-100 p-4">CRUD Makanan/Minuman</a>
        </div>
    </div>
@else
    <p>Anda login sebagai <strong>User Biasa</strong>. Hanya dapat melihat data (segera hadir).</p>
    <b class="fs-1">Pencet Barang di kiri untuk melihat crud </b>
@endif
@endsection