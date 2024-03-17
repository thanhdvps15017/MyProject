@extends('Admin.Pages.layout')

@section('content')
    <div class="container">
        <h4 class="header-line row">ĐƠN HÀNG</h4>
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    DANH SÁCH ĐƠN HÀNG
                </div>
                @if (session('success'))
                    <div class="help-block alert-success">
                        {{ session('success') }}
                    </div>
                @endif
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
                                            style="width: 292px;">TÊN KHÁCH HÀNG</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1"
                                            colspan="1" aria-label="Browser: activate to sort column ascending"
                                            style="width: 292px;">SỐ ĐIỆN THOẠI</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1"
                                            colspan="1" aria-label="Browser: activate to sort column ascending"
                                            style="width: 292px;">ĐỊA CHỈ</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1"
                                            colspan="1" aria-label="Browser: activate to sort column ascending"
                                            style="width: 292px;">PHƯƠNG THỨC THANH TOÁN</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1"
                                            colspan="1" aria-label="Browser: activate to sort column ascending"
                                            style="width: 292px;">TIỀN</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1"
                                            colspan="1" aria-label="Browser: activate to sort column ascending"
                                            style="width: 292px;">GHI CHÚ</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1"
                                            colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                            style="width: 264px;">HÀNH ĐỘNG</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order as $items)
                                        <tr class="gradeA odd ">
                                            <td class="col-md-1">{{ ++$i }}</td>
                                            <td class="col-md-2">{{ $items->name }} ( ID:{{ $items->userID }} )</td>
                                            <td class="col-md-1">{{ $items->tel }}</td>
                                            <td class="col-md-3">{{ $items->city }}, {{ $items->district }},
                                                {{ $items->ward }}, {{ $items->address }}</td>
                                            <td class="col-md-1">{{ $items->payment }}</td>
                                            <td class="col-md-1">{{ number_format($items->total, 0, ',', '.') }}</td>
                                            <td class="col-md-2">{{ $items->note }}</td>

                                            <td class="col-md-1">
                                                <form action="{{ route('order.delete', $items->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('order.detail', $items->id) }}" class="btn btn-default"><i class=" fa fa-refresh "></i> Chi tiết</a>
                                                    |
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
                                        {{ $order->links() }}
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
