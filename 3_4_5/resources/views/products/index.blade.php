@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Daftar Produk
                        <div class="float-right">
                            <a href="{{ route('products.create') }}" class="btn btn-primary">Tambah</a>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-responsive table-striped table-borderless table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Produk</th>
                                        <th>Image</th>
                                        <th>Harga</th>
                                        <th>Stock</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $key => $product)
                                        <tr>
                                            <td class="align-middle">{{ $products->firstItem() + $key }}</td>
                                            <td class="align-middle">{{ $product->nama_produk }}</td>
                                            <td class="align-middle"><img class="img-responsive"
                                                                          src="{{ url('uploads/'.$product->image)}}"
                                                                          alt="{{ $product->image }}"></td>
                                            <td class="align-middle">{{ $product->harga }}</td>
                                            <td class="align-middle">{{ $product->stock }}</td>
                                            <td class="align-middle">
                                                <a href="{{ route('products.show', $product->id) }}"
                                                   class="btn btn-primary" data-toggle="tooltip"
                                                   data-placement="bottom"
                                                   title="Detail">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="{{ route('products.edit', $product->id) }}"
                                                   class="btn btn-info"
                                                   data-toggle="tooltip" data-placement="bottom" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="javascript:;" data-toggle="modal"
                                                   onclick="deleteData({{$product->id}})"
                                                   data-target="#DeleteModal" class="btn btn-xs btn-danger"><i
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12">
                                {{ $products->links() }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="DeleteModal" class="modal fade text-danger" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <!-- Modal content-->
            <form action="" id="deleteForm" method="post">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h4 class="modal-title text-center" style="color: white;">DELETE CONFIRMATION</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <p class="text-center">Apakah anda yakin ingin menghapus produk tersebut?</p>
                    </div>
                    <div class="modal-footer">
                        <center>
                            <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                            <button type="submit" name="" class="btn btn-danger" data-dismiss="modal"
                                    onclick="formSubmit()">Yes, Delete
                            </button>
                        </center>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('javascript')
    <script type="text/javascript">
        function deleteData(id) {
            var id = id;
            var url = '{{ route("products.destroy", ":id") }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }

        function formSubmit() {
            $("#deleteForm").submit();
        }
    </script>
@endsection
