<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\Kategori;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function dashboard(Produk $produk){
        $produks = Produk::all();
        $kategoris=kategori::all();
        return view('main.admin.produk.index' , ['produks'=>$produks], compact('kategoris'));
    }

    public function profile(Produk $produk,Kategori $kategori){
        $produks = Produk::all();
        $kategoris=kategori::all();
        return view('profile.show', compact('produk'), compact('kategoris'));
    }
    public function index(Kategori $kategori){
        $produks = Produk::all();
        $kategoris=kategori::all();
        return view('main.admin.produk.index' , ['produks'=>$produks], compact('kategoris'));
    }

    public function show(Produk $produk){
        return view('main.admin.produk.show' , );
    }

    public function create(){
        $kategoris=kategori::all();
        return view('main.admin.produk.create',compact('kategoris'));
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'code' => 'required|size:4|unique:produks',
            'nama' => 'required|min:4|max:50',
            'harga' => 'required|min:5|max:20',
            'kategori_id' => 'required',
            'status' => 'required|in:R,N',
            'image' => 'image|image|max:3000'
        ]);
        // $validateData = $request->all();
        $validateData['image'] = $request->file('image')->store('assets/gallery', 'public');

        Produk::create($validateData);
        $request->session()->flash('pesan' , "Produk {$validateData['nama']} Berhasil Ditambahkan");
        return redirect()->route('produks.index');
    }

    public function edit(Produk $produk){
        $kategoris=kategori::all();
        return view('main.admin.produk.edit' , compact('produk'), compact('kategoris'));
    }

    public function update(Request $request, Produk $produk){
        $validateData = $request->validate([
            'code' => 'required|size:4|unique:produks,code,'.$produk->id,
            'nama' => 'required|min:4|max:50',
            'harga' => 'required|min:5|max:20',
            'kategori_id' => 'required',
            'status' => 'required|in:R,N',
            'image'  => 'image|image|max:3000'
        ]);
        if($request->image){
            Storage::delete('public/'.$produk->image);
            $validateData['image'] = $request->file('image')->store('assets/gallery', 'public');
        }
        $produk->update($validateData);

        return redirect()->route('produks.index', ['produk'=>$produk->id])->with('pesan' , "Perubahan Produk Berhasil");
    }

    public function destroy(Produk $produk){
        $produk->delete();
        return redirect()->route('produks.index')->with('hapus', "Hapus Menu $produk->nama Berhasil");
    }
}
