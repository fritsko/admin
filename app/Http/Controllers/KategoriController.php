<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\produk;

class KategoriController extends Controller
{
    public function index(){
        $kategoris = kategori::all();
        $produks = Produk::all();
        return view('main.admin.kategori.index' ,['produks'=>$produks] , ['kategoris'=>$kategoris]);
    }

    public function create(){
        $kategoris=kategori::all();
        $produks = Produk::all();
        return view('main.admin.kategori.create',compact('kategoris'), ['produks'=>$produks]);
    }

    public function store(Request $request){
        $Data = $request->validate([
            'nama_kategori' => 'required|min:4|max:50',

        ]);
        // $validateData = $request->all();
        Kategori::create($Data);
        $request->session()->flash('pesan' , "Kategori {$Data['nama_kategori']} Berhasil Ditambahkan");
        return redirect()->route('kategoris.index');
    }

    public function destroy(Kategori $kategori){
        $kategori->delete();
        return redirect()->route('kategoris.index')->with('hapus', "Hapus Menu $kategori->nama_kategori Berhasil");
    }
}
