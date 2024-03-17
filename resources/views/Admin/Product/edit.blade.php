@extends('Admin.Pages.layout')

@section('content')
    <div class="container">
        <div class="row pad-botm">
            <h4 class="header-line">SẢN PHẨM</h4>
        </div>
        @if (session('success'))
            <div class="help-block alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="panel panel-info">
                <div class="panel-heading">
                    THÊM SẢN PHẨM
                </div>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ route('product.update', $product->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="col-md-6">
                                <label>Tên sản phẩm</label>
                                <input class="form-control" type="text" name="name" value="{{ $product->name }}">
                                @error('name')
                                    <p class="help-block alert alert-danger">{{ $message }}</p>
                                @enderror

                            </div>
                            <div class="col-md-6">
                                <label>Giá</label>
                                <input class="form-control" type="number" name="price" value="{{ $product->price }}">
                                
                                @error('price')
                                    <p class="help-block alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <label>Thương hiệu</label>
                                <select class="form-control" name="brand" id="brand" value="{{ $product->brand }}">
                                    <option value="{{ $product->brand }}">{{ $product->brand }}</option>
                                    @foreach ($brand as $items)
                                        <option value="{{ $items->name }}">{{ $items->name }}</option>
                                    @endforeach
                                </select>
                                @error('brand')
                                    <p class="help-block alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label>Số lượng</label>
                                <input class="form-control" type="number" name="quantity"
                                    value="{{ $product->quantity }}">
                                @error('quantity')
                                    <p class="help-block alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group col-md-12">
                            <label>Hình ảnh</label>
                            <input class="form-control" type="file" name="image" value="{{ $product->image }}">
                            @error('image')
                                <p class="help-block alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label>Mô tả</label>
                            <textarea name="description" class="form-control" rows="3" value="{{ $product->description }}">{{ $product->description }}</textarea>
                            @error('description')
                                <p class="help-block alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>



                        <button type="submit" class="btn btn-info">THÊM </button>

                    </form>
                </div>
            </div>
        </div>


    </div>
@endsection
