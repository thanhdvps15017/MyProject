@extends('Admin.Pages.layout')

@section('content')
    <div class="container">
        <h4 class="header-line row">THƯƠNG HIỆU</h4>
        <div class="row">
            <div class="panel panel-info">
                <div class="panel-heading">
                    THÊM THƯƠNG HIỆU
                </div>
                @if (session('success'))
                    <div class="help-block alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="panel-body">
                    <form action="{{ route('brand.create') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>TÊN THƯƠNG HIỆU</label>
                            <input class="form-control" type="text" name="name" placeholder="Nhập tên thương hiệu">
                            @error('name')
                                <p class="help-block  alert-danger">{{ $message }}</p>
                            @enderror

                        </div>

                        <button type="submit">Thêm</button>

                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    DANH SÁCH THƯƠNG HIỆU
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                            <table class="table table-striped table-bordered table-hover dataTable no-footer"
                                id="dataTables-example" aria-describedby="dataTables-example_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example"
                                            rowspan="1" colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column ascending"
                                            style="width: 190px;">STT</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1"
                                            colspan="1" aria-label="Browser: activate to sort column ascending"
                                            style="width: 292px;">TÊN THƯƠNG HIỆU</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1"
                                            colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                            style="width: 264px;">HÀNH ĐỘNG</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($brand as $items)
                                        <tr class="gradeA odd ">
                                            <td class="col-md-1">{{ ++$i }}</td>
                                            <td class="col-md-7">{{ $items->name }}</td>
                                            <td class="col-md-2">
                                                <form action="{{ route('brand.delete', $items->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <a class="btn btn-primary" href="{{ route('brand.edit', $items->id) }}">
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
                                        {{ $brand->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--End Advanced Tables -->

            </div>
        </div>
    </div>
@endsection
