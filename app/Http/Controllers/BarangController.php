<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::orderBy('id', 'desc')->get();
        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:100',
            'stok'        => 'required|integer',
            'harga'       => 'required|numeric',
        ]);

        Barang::create($validated);
        return redirect('/barang')->with('success', 'Data barang berhasil disimpan');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:100',
            'stok'        => 'required|integer',
            'harga'       => 'required|numeric',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update($validated);
        return redirect('/barang')->with('success', 'Data barang berhasil diupdate');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return redirect('/barang')->with('success', 'Data barang berhasil dihapus');
    }
}