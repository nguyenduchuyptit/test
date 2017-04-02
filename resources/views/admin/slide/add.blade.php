{{-- kế thừa thuộc tính,vv trang index --}}
@extends('admin.layouts.index')
{{-- câu lệnh để nhúng --}}
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Slide
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->

                    <div class="col-lg-12 table-responsive" style="padding-bottom:120px">

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
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {!! session('error') !!}
                            </div>
                        @endif

                        <form action="{{ url('admin/slide/add') }}" method="POST" enctype="multipart/form-data">
                            <table class="table table-striped">
                                <div class="form-group">
                                    <label>Tên</label>
                                    <input class="form-control" name="Ten" placeholder="Đừng bỏ trống" value="{{ old('Ten') }}" />
                                </div>
                                <div class="form-group">
                                    <label>Ảnh</label>
                                    <input type="file" name="Hinh"/>
                                </div>
                                <div class="form-group">
                                    <label>Nội Dung</label>
                                    <textarea id="demo" class="form-control ckeditor" rows="3" name="NoiDung">{{ old('NoiDung') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>link</label>
                                    <input class="form-control" name="link" placeholder="Đừng bỏ trống" value="{{ old('link') }}" />
                                </div>
                                <button type="submit" class="btn btn-success">Add Slide</button>&nbsp;
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            </table>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection
