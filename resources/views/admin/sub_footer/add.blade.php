{{-- kế thừa thuộc tính,vv trang index --}}
@extends('admin.layouts.index')
{{-- câu lệnh để nhúng --}}
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sub Footer Cate
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->

                    {{-- kiểm tra xem có tồn tại lỗi không rồi in ra --}}
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors) > 0 )
                            <div class="alert alert-danger">
                                {{-- gọi đến tất cả các lỗi có thể xảy ra --}}
                                @foreach ($errors->all() as $loi)
                                    {!! $loi !!}<br>
                                @endforeach
                            </div>
                        @endif
                        
                        {{-- kiểm tra xem có nhận đc session thông báo lúc redirect lại không --}}
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {!! session('thongbao') !!}
                            </div>
                        @endif
                        <form action="{{ url('admin/sub-footer/add') }}" method="POST">
                            <div class="form-group">
                                <label>Footer</label>
                                <select class="form-control" name="Footer">
                                @foreach ($footer as $foo)
                                    <option @if(old('Footer')==$foo->id) {!! "selected" !!} @endif value="{!! $foo->id !!}">{!! $foo->ten !!}</option>
                                @endforeach
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Sub Footer</label>
                                <input class="form-control" name="Ten" placeholder="Vui lòng đừng bỏ trống" value="{!! old('Ten') !!}" />
                            </div>

                            <button type="submit" class="btn btn-success">Add SubFooter</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                            <input type="hidden" name="_token" value="{!!csrf_token()!!}">
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection