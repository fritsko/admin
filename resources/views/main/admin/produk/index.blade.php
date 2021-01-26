@extends('layout.master')
@section('title', 'Data Produk')
@section('produk', 'active')
@section('page')
    <div class="container-fluid mt-3">     
        <div class="row">
            <div class="col-md-12">
                <div class="py-4">
                    <h2>Tabel Data Produk</h2>
                    <a href="{{route('produks.create')}}" class="btn btn-primary">Tamabahkan Produk</a>
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
                            <th>Code</th>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Ketegori</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($produks as $produk)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td><a href="">{{$produk->code}}</a></td>
                                <td>
                                    <img src="{{Storage::url(($produk->image))}}" alt="gambar" style="width: 150px;">
                                </td>
                                <td>{{$produk->nama}}</td>
                                <td>{{$produk->harga}}</td>
                                <td>{{$produk->kategori->nama_kategori}}</td>
                                <td>{{$produk->status== 'R'?'Tersedia':'Tidak Tersedia'}}</td>
                                <td class="pt-3 d-flex justify-content-end">
                                    <a href="{{route('produks.edit',$produk->id)}}" class="btn btn-primary">Edit data</a>
                                    <form action="{{route('produks.destroy', $produk->id)}}" method="POST">
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
