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
                    <form role="form" method="POST" action="{{ route('product.create') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="col-md-6">
                                <label>Tên sản phẩm</label>
                                <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <p class="help-block alert alert-danger">{{ $message }}</p>
                                @enderror

                            </div>
                            <div class="col-md-6">
                                <label>Giá</label>
                                <input class="form-control" type="number" name="price" value="{{ old('price') }}">
                                @error('price')
                                    <p class="help-block alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <label>Thương hiệu</label>
                                <select class="form-control" name="brand" id="brand" value="{{ old('brand') }}">
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
                                <input class="form-control" type="number" name="quantity" value="{{ old('quantity') }}">
                                @error('quantity')
                                    <p class="help-block alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group col-md-12">
                            <label>Hình ảnh</label>
                            <input class="form-control" type="file" name="image" value="{{ old('image') }}"
                                id="upload" onchange="Upload()">
                            @error('image')
                                <p class="help-block alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label>Mô tả</label>
                            <textarea name="description" class="form-control" rows="3" value="{{ old('description') }}"></textarea>
                            @error('description')
                                <p class="help-block alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>



                        <button type="submit" class="btn btn-info">THÊM </button>

                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    DANH SÁCH SẢN PHẨM
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                            <table class="table table-striped table-bordered table-hover dataTable no-footer">
                                <thead>
                                    <tr role="row">
                                        <th>STT</th>
                                        <th>TÊN SẢN PHẨM</th>
                                        <th>TÊN THƯƠNG HIỆU</th>
                                        <th>GÍA</th>
                                        <th>SỐ LƯỢNG</th>
                                        <th>HÌNH ẢNH</th>
                                        <th>HÀNH ĐỘNG</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product as $items)
                                        <tr class="gradeA odd ">
                                            <td class="col-md-1">{{ ++$i }}</td>
                                            <td class="col-md-2">{{ $items->name }}</td>
                                            <td class="col-md-2">{{ $items->brand }}</td>
                                            <td class="col-md-1">{{ number_format($items->price, 0, ',', '.') }}</td>
                                            <td class="col-md-1">{{ $items->quantity }}</td>
                                            <td class="col-md-1"><img style="width:50px; height: 50px;"
                                                    src="{{ asset($items->image) }}">
                                            </td>
                                            <td class="col-md-2">
                                                <form action="{{ route('product.delete', $items->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <a class="btn btn-primary"
                                                        href="{{ route('product.edit', $items->id) }}">
                                                        <i class="fa fa-edit "></i>
                                                        Edit
                                                    </a>
                                                    <button class="btn btn-danger"><i class="fa fa-pencil"></i>
                                                        Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                                        {{ $product->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Advanced Tables -->

            </div>
        </div>

        <script>
            < /script <
            /div>
        @endsection
