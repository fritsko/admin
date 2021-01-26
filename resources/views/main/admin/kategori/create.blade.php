@extends('layout.master')
@section('title', 'Form Produk')
@section('produk', 'active')
@section('page')
<div class="container bg-white">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Kategori Baru</h1>
            <hr>
            <form action="{{ route('kategoris.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama_kategori">Nama Menu</label>
                    <input type="text" name="nama_kategori" id="nama_kategori" class="form-control @error('title') is-invalid @enderror">
                    @error('nama_kategori')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mb-2">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
