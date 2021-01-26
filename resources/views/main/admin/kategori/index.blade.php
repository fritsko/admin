@extends('layout.master')
@section('title', 'Data Kategori')
@section('kategori', 'active')
@section('page')
    <div class="container-fluid mt-3">     
        <div class="row">
            <div class="col-md-12">
                <div class="py-4">
                    <h2>Tabel kategori</h2>
                    <a href="{{route('kategoris.create')}}" class="btn btn-primary">Tamabahkan Produk</a>
                </div>
                @if (session('pesan'))
                    <div class="alert alert-success">
                        {{session('pesan')}}
                    </div>
                @endif
                @if (session('hapus'))
                <div class="alert alert-danger">
                    {{session('hapus')}}
                </div>
            @endif
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Kategori</th>
                            <th>Jumlah Produk</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kategoris as $kategori)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$kategori->nama_kategori}}</td>
                                <td>{{$kategori->count()}}</td>
                                <td class="pt-3 d-flex justify-content-end">
                                    <form action="{{route('kategoris.destroy', $kategori->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <td colspan="6" class="text-center">Data Kosong</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div> 
@endsection
