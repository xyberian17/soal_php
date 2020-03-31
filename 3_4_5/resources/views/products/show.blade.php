@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Detail Produk
                        <div class="float-right">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('products.index') }}" class="btn btn-success">Kembali</a>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-sm">
                                <table class="table table-responsive table-borderless table-hover">
                                    <tr>
                                        <th>Nama Produk</th>
                                        <td>:</td>
                                        <td>{{ $product->nama_produk }}</td>
                                    </tr>
                                    <tr>
                                        <th>Harga</th>
                                        <td>:</td>
                                        <td>{{ $product->harga }}</td>
                                    </tr>
                                    <tr>
                                        <th>Stock</th>
                                        <td>:</td>
                                        <td>{{ $product->stock }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-sm">
                                <img class="card-img-top" src="{{ url('uploads/'.$product->image)}}"
                                     alt="{{ $product->image }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
