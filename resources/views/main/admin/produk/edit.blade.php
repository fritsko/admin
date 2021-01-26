@extends('layout.master')
@section('title', 'Form Produk')
@section('produk', 'active')
@section('page')
<div class="container bg-white">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Menu Baru</h1>
            <hr>
            <form action="{{ route('produks.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="code">Code</label>
                    <input type="text" name="code" id="code"  class="form-control @error('title') is-invalid @enderror" value="{{old('code') ?? $produk->code}}">
                    @error('code')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama">Nama Menu</label>
                    <input type="text" name="nama" id="nama" class="form-control @error('title') is-invalid @enderror" value="{{old('nama') ?? $produk->nama}}">
                    @error('nama')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" name="harga" id="harga" class="form-control @error('title') is-invalid @enderror" value="{{old('harga') ?? $produk->harga}}">
                    @error('harga')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kategori_id">Kategori</label>
                    <select class="form-control" id="kategori_id" name="kategori_id">
                        @forelse ($kategoris as $kategori)
                            <option value="{{$kategori->id}}" {{old('kategori_id')=="$kategori->nama_kategori" ? 'selected' : ''}}>
                                {{$kategori->nama_kategori}}
                            </option>
                        @empty
                            
                        @endforelse
                    </select>
                    @error('kategori')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status" value="R" {{old('status') ?? $produk->status=='R' ? 'checked':''}}>
                        <label class="tersedia" for="form-check-label">Tersedia</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status" value="N" {{old('status') ?? $produk->status=='N' ? 'checked':''}}>
                        <label class="tidak_tersedia" for="form-check-label">Tidak Tersedia</label>
                    </div>
                    @error('status')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="iamge">Gambar menu</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
