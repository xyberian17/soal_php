@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-sm">
                                <form class="form-horizontal" method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group{{ $errors->has('nama_produk') ? ' has-error' : '' }}">
                                        <label for="nama_produk" class="col-md-4 control-label">Nama Produk</label>
                                        <div class="col-md-12">
                                            <input id="nama_produk" type="text" class="form-control" name="nama_produk"
                                                   value="@if (old('nama_produk') != ''){{ old('nama_produk') }}@else{{$product->nama_produk}}@endif"
                                                   required autofocus>

                                            @if ($errors->has('nama_produk'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('nama_produk') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('harga') ? ' has-error' : '' }}">
                                        <label for="harga" class="col-md-4 control-label">Harga</label>

                                        <div class="col-md-12">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp.</span>
                                                </div>
                                                <input id="harga" type="number" class="form-control" name="harga"
                                                       value="@if (old('harga') != ''){{ old('harga') }}@else{{$product->harga}}@endif"
                                                       required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>


                                            @if ($errors->has('harga'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('harga') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('stock') ? ' has-error' : '' }}">
                                        <label for="stock" class="col-md-4 control-label">Stock</label>

                                        <div class="col-md-12">
                                            <input id="stock" type="number" class="form-control" name="stock"
                                                   value="@if (old('stock') != ''){{ old('stock') }}@else{{$product->stock}}@endif"
                                                   required>

                                            @if ($errors->has('stock'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('stock') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                        <label for="image" class="col-md-4 control-label">Image</label>

                                        <div class="col-md-12">
                                            <div class="custom-file">
                                                <input id="image" type="file" class="custom-file-input" name="image"
                                                       value="@if (old('image') != ''){{ old('image') }}@else{{$product->image}}@endif">
                                                <label class="custom-file-label" for="customFile">@if (old('image') != ''){{ old('image') }}@else{{$product->image}}@endif</label>
                                            </div>


                                            @if ($errors->has('image'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm">
                                <img class="card-img-top" id='img-upload' src="{{ url('uploads/'.$product->image)}}"
                                     alt="{{ $product->image }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script type="text/javascript">
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function () {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            readURL(this);
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#img-upload').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function () {
            readURL(this);
        });
    </script>
@endsection

