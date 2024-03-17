@extends('Admin.Pages.layout')

@section('content')
    <div class="container">
        <h4 class="header-line row">THƯƠNG HIỆU</h4>
        <div class="row">
            <div class="panel panel-info">
                <div class="panel-heading">
                    THAY ĐỔI THƯƠNG HIỆU
                </div>
                <div class="panel-body">
                    <form action="{{ route('brand.update', $brand->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>TÊN THƯƠNG HIỆU</label>
                            <input class="form-control" type="text" name="name" value="{{ $brand->name }}">
                        </div>

                        <button type="submit">SỬA</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
