@extends('Admin.Pages.layout')

@section('content')
    <div class="container">
        <h4 class="header-line row">ĐƠN HÀNG</h4>
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    CHI TIẾT ĐƠN HÀNG
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
                                            style="width: 292px;">TÊN SẢN PHẨM</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1"
                                            colspan="1" aria-label="Browser: activate to sort column ascending"
                                            style="width: 292px;">SỐ  LƯỢNG</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1"
                                            colspan="1" aria-label="Browser: activate to sort column ascending"
                                            style="width: 292px;">GIÁ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detail as $items)
                                        <tr class="gradeA odd ">
                                            <td class="col-md-1">{{ ++$i }}</td>
                                            <td class="col-md-5">{{ $items->productName }} ( ID:{{ $items->product_id }} )</td>
                                            <td class="col-md-2">{{ $items->quantity }}</td>
                                            <td class="col-md-2">{{ number_format($items->price, 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <!--End Advanced Tables -->

            </div>
        </div>
    </div>
@endsection
