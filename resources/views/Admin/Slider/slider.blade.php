@extends('Admin.Pages.layout')
@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">SLIDE SHOW</h4>
                </div>
            </div>
            @php $i=1 @endphp
            <div class="row">
                @foreach ($slider as $items)
                    <form role="form" method="POST" action="{{ route('slider.update', $items->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    SLIDER {{ $i++ }}
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>Slider dòng 1</label>
                                        <input class="form-control" type="text" name="content1"
                                            value="{{ $items->content1 }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Slider dòng 2</label>
                                        <input class="form-control" type="text" name="content2"
                                            value="{{ $items->content2 }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Slider dòng 3</label>
                                        <input class="form-control" type="text" name="content3"
                                            value="{{ $items->content3 }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Slider dòng 4</label>
                                        <input class="form-control" type="text" name="content4"
                                            value="{{ $items->content4 }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Hình ảnh</label>
                                        <input class="form-control" type="file" name="images" id="upload"
                                            value="{{ asset('uploads/' . $items->images) }}">
                                        <img style="width: 100%; height:500px;"
                                            src="{{ asset('uploads/' . $items->images) }}" id="preview"
                                            alt="Preview Image">
                                    </div>
                                    <button type="submit" class="btn btn-info">CẬP NHẬP </button>
                                </div>
                            </div>
                        </div>
                    </form>
                @endforeach
            </div>

        </div>
    </div>
    <script>
        document.getElementById('upload').onchange = function(e) {
            var reader = new FileReader();

            reader.onload = function(event) {
                document.getElementById('preview').src = event.target.result;
            }

            reader.readAsDataURL(e.target.files[0]);
        };
    </script>
@endsection
