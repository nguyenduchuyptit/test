    {{-- kế thừa thuộc tính,vv trang index --}}
    @extends('admin.layouts.index')
        {{-- câu lệnh để nhúng --}}
        <!-- Page Content -->
    @section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Footer
                            <small>Đang sửa: {!! $footer->ten !!}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                    {{-- kiểm tra tồn tại lỗi, đếm số lỗi --}}
                    @if (count($errors)>0)
                        <div class="alert alert-danger">
                            {{-- lấy tất cả lỗi --}}
                            @foreach ($errors->all() as $loi)
                                {{ $loi }}<br>
                            @endforeach
                        </div>
                    @endif
                    
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{ session('thongbao') }}
                        </div>
                    @endif
                    {{-- muốn gửi được dữ liệu đi phải gửi đến route --}}
                        <form action="{{ url('admin/footer/edit/'.$footer->id) }}" method="POST">
                            
                            <div class="form-group">
                                <label>Footer</label>
                                <input class="form-control" name="Ten" placeholder="Điền tên footer category" value="@if(old('Ten')) {!! old('Ten') !!}
                                @else {!! $footer->ten !!} @endif"/>
                            </div>
                            <button type="submit" class="btn btn-success">Edit Footer</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                            {{-- KHÔNG BAO GIỜ ĐƯỢC THIẾU TOKEN --}}
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    @endsection