<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Produk';
        $subtitle = 'Index';
        $produks = Produk::all();
        return view('admin.produk.index', compact('title', 'subtitle', 'produks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Produk';
        $subtitle = 'Create';
        return view('admin.produk.create', compact('title', 'subtitle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'NamaProduk' => 'required',
            'Harga' => 'required|numeric',
            'Stok' => 'required|numeric',
        ]);

        $simpan = Produk::create($validate);
        if($simpan) {
            return response()->json(['status' => 200, 'message' => 'Produk Berhasil']);
        }else{
            return response()->json(['status' => 500, 'message' => 'Produk Gagal']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // $title = 'Produk';
        // $subtitle = "Edit";
        $produkAll = Produk::all();
        $produk = Produk::find($id);

        $data['title'] = 'Produk';
        $data['subtitle'] = 'edit';
        $data['ProdukAll'] = $produkAll;
        $data['produk'] =  $produk;

        return view('admin.produk.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        
        $validate = $request->validate([
            'NamaProduk' => 'required',
            'Harga' => 'required|numeric',
            'Stok' => 'required|numeric',
        ]);

        $simpan = $produk->update($validate);
        if ($simpan){
            return response()->json(['status' => 200, 'message' => 'Produk Berhasil Diubah']);
        }else{
            return response()->json(['status' => 500, 'message' => 'Produk Gagal']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        //
    }
}
